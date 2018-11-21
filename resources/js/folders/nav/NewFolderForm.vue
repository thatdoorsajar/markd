<template>
    <div class="leading-normal">
        <button class="flex border-l-4 border-transparent font-semibold text-grey hover:text-teal trans:color icon-text-aligner focus:outline-none p-2 mb-4"
            v-show="!showForm"
            @click="openNewFolderForm">
            <svg class="icon">
                <use href="/svg/icons.svg#icon-c-add" xlink:href="/svg/icons.svg#icon-c-add"/>
            </svg>
            &nbsp;add
        </button>
        <div class="relative mb-4">
            <input class="w-full h-auto bg-grey-light appearance-none border-2 border-grey-light rounded-sm text-base text-grey-darker font-semibold focus:outline-none focus:bg-grey-lighter focus:border-teal pl-8 pr-3 py-2"
                type="text" 
                ref="newFolderInput"
                v-model="newFolderTitle"
                v-show="showForm" 
                @blur="closeNewFolderForm"
                @keydown.esc="closeNewFolderForm"
                @keydown.enter="submitNewFolder"
                :class="{'opacity-50 cursor-not-allowed': loading}">
            <div class="absolute" v-show="showForm" style="top: 50%; margin-top: -10px; left: 12px">
                <svg class="icon text-grey-light">
                    <use href="/svg/icons.svg#icon-folder-15-2" xlink:href="/svg/icons.svg#icon-folder-15-2"/>
                </svg>
            </div>
            <div class="absolute" v-show="loading" style="top: 50%; margin-top: -10px; right: 12px">
                <svg class="icon text-grey spin-normal">
                    <use href="/svg/icons.svg#icon-circle" xlink:href="/svg/icons.svg#icon-circle"/>
                </svg>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapMutations } from 'vuex';

    export default {
        props: {
            parent_id: {
                type: Number,
                default: null
            }
        },

        data() {
            return {
                showForm: false,
                newFolderTitle: '',
                loading: false
            }
        },

        methods: {
            ...mapMutations([
                'setFoldersFlat',
                'setFoldersTree'
            ]),

            openNewFolderForm(el) {
                this.showForm = true;

                this.$nextTick(() => this.$refs.newFolderInput.focus());
            },

            closeNewFolderForm(el) {
                this.showForm = false;

                this.newFolderTitle = '';
            },

            submitNewFolder() {
                let route = '/api/folder';
                let data = {
                    parent_id: this.parent_id,
                    folder_title: this.newFolderTitle
                };

                this.loading = true;

                axios.post(route, data).then(({ data }) => {
                    this.setFoldersFlat(data.foldersFlat);
                    this.setFoldersTree(data.foldersTree);
                    this.closeNewFolderForm();
                    this.loading = false;
                    this.$router.push(`/f/${data.newFolderSlug}`);
                });
            }
        }
    }
</script>
