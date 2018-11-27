<template>
    <div class="flex">
        <button class="text-2xl pt-1 px-2 mr-3 focus:outline-none" @click="modalOpen = true">
            <svg class="icon icon-outline icon-stroke-3 hover:text-teal text-grey-dark">
                <use href="/svg/icons.svg#icon-e-add" xlink:href="/svg/icons.svg#icon-e-add"/>
            </svg>
        </button>
        <abstract-modal 
            :show="modalOpen" 
            @close="modalOpen = false"
            width-type="large">
            <template slot="title">New Bookmark URL</template>
            <template>
                <div class="relative mb-4">
                    <input class="w-full h-auto font-century font-semibold text-base text-grey-darker bg-grey-light appearance-none border-2 border-grey-light rounded-sm focus:outline-none focus:bg-grey-lighter focus:border-teal pl-8 pr-3 py-2"
                        type="text" 
                        v-model="newBookmarkUrl"
                        ref="urlInput"
                        @keydown.enter="submitBookmarkUrl"
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
                    <button class="font-century text-lg text-white rounded-sm  trans:bg focus:shadow-outline focus:outline-none py-2 px-4"
                        :class="loading ? 'cursor-not-allowed bg-grey-light' : 'bg-grey-darker hover:bg-grey-darkest'"
                        type="button"
                        @click="submitBookmarkUrl"
                        :disabled="loading">
                        Update
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
                newBookmarkUrl: '',
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
                        setTimeout(() => {this.$refs.urlInput.focus()}, 100);
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

            closeModal() {
                this.loading = this.modalOpen = false;
            },

            submitBookmarkUrl() {
                let route = `/api/folder/${this.getActiveFolder.slug}/bookmark`
                let data = {
                    new_bookmark_url: this.newBookmarkUrl, 
                };

                this.loading = true;

                axios.post(route, data).then(({ data }) => {
                    this.setFoldersFlat(data.foldersFlat);
                    this.setFoldersTree(data.foldersTree);
                    this.setActiveFolder(this.getActiveFolder.slug);
                    this.new_bookmark_url = '';
                    this.loading = false;
                    this.closeModal();
                });
            }
        }
    }
</script>
