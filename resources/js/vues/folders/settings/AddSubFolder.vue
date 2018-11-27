<template>
    <div class="inline">
        <!-- <a href="#" 
            class="flex text-grey-darker no-underline px-4 py-3"
            @click.prevent="openModalCloseDropDown">
            <svg class="icon text-grey-darker mr-2"><use href="/svg/icons.svg#icon-c-add" xlink:href="/svg/icons.svg#icon-c-add"/></svg>
            <span>sub folder</span>
        </a> -->
        <button class="font-semibold text-grey hover:text-teal trans:color focus:outline-none"
            @click="openModalCloseDropDown">
            sub folder
        </button>
        <abstract-modal 
            :show="modalOpen" 
            @close="modalOpen = false">
            <template slot="title">Add Sub Folder</template>
            <template>
                <div class="relative mb-4">
                    <input class="w-full h-auto font-century font-semibold text-base text-grey-darker bg-grey-light appearance-none border-2 border-grey-light rounded-sm focus:outline-none focus:bg-grey-lighter focus:border-teal pl-8 pr-3 py-2"
                        type="text" 
                        v-model="newFolderTitle"
                        ref="titleInput"
                        @keydown.enter="submitAddFolder"
                        :class="{'opacity-50 cursor-not-allowed': loading}">
                    <div class="absolute" style="top: 50%; margin-top: -9px; left: 12px">
                        <svg class="icon text-grey-darker">
                            <use href="/svg/icons.svg#icon-folder-15-2" xlink:href="/svg/icons.svg#icon-folder-15-2"/>
                        </svg>
                    </div>
                    <div class="absolute" v-show="loading" style="top: 50%; margin-top: -9px; right: 12px">
                        <svg class="icon text-grey-light spin-normal">
                            <use href="/svg/icons.svg#icon-circle" xlink:href="/svg/icons.svg#icon-circle"/>
                        </svg>
                    </div>
                </div>
                <div class="flex justify-between">
                    <button class="font-century text-lg text-grey-dark hover:text-grey-darkest trans:bg focus:shadow-outline focus:outline-none py-2 px-4 mr-2"
                        type="button"
                        @click="closeModal">
                        Cancel
                    </button>
                    <button class="font-century text-lg text-white rounded-sm trans:bg focus:shadow-outline focus:outline-none py-2 px-4"
                        :class="loading ? 'cursor-not-allowed bg-grey-light' : 'bg-grey-darker hover:bg-grey-darkest'"
                        type="button"
                        @click="submitAddFolder"
                        :disabled="loading">
                        Create
                    </button>
                </div>
            </template>
        </abstract-modal>
    </div>
</template>

<script>
    import { mapGetters, mapMutations } from 'vuex';

    export default {
        data() {
            return {
                modalOpen: false,
                newFolderTitle: '',
                loading: false
            }
        },

        computed: mapGetters([
            'getActiveFolder'
        ]),

        watch: {
            modalOpen(modalOpen) {
                if (modalOpen) {
                    this.$nextTick(() => {
                        setTimeout(() => {this.$refs.titleInput.focus()}, 100);
                    });
                }
            }
        },

        methods: {
            ...mapMutations([
                'setFoldersFlat',
                'setFoldersTree',
                'setActiveFolder'
            ]),

            openModalCloseDropDown() {
                this.modalOpen = true;

                this.$emit('close-menu');
            },

            closeModal(el) {
                this.loading = this.modalOpen = false;

                this.newFolderTitle = '';
            },

            submitAddFolder() {
                let route = `/api/folder`;
                let data = {
                    parent_id: this.getActiveFolder.id,
                    folder_title: this.newFolderTitle
                };

                this.loading = true;

                axios.post(route, data).then(({ data }) => {
                    this.setFoldersFlat(data.foldersFlat);
                    this.setFoldersTree(data.foldersTree);
                    this.closeModal();
                    this.$router.push(`/f/${data.newFolderSlug}`);
                });
            }
        }
    }
</script>
