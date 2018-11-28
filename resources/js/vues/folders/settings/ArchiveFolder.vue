<template>
    <div class="inline">
        <!-- <a href="#" 
            class="flex text-grey-darker no-underline px-4 py-3"
            @click.prevent="openModalCloseMenu">
            <svg class="icon text-grey-darker mr-2"><use href="/svg/icons.svg#icon-box" xlink:href="/svg/icons.svg#icon-box"/></svg>
            <span>archive</span>
        </a> -->
        <button class="font-semibold text-grey hover:text-teal trans:color focus:outline-none"
            @click="openModalCloseMenu">
            archive
        </button>
        <abstract-modal 
            :show="modalOpen" 
            @close="modalOpen = false">
            <template slot="title">Archive {{ getActiveFolder.title }}?</template>
            <template>
                <div class="flex justify-between">
                    <button class="font-century text-lg text-grey-dark hover:text-grey-darkest trans:bg focus:shadow-outline focus:outline-none py-2 px-4 mr-2"
                        type="button"
                        @click="closeModal">
                        Cancel
                    </button>
                    <button class="font-century text-lg text-white rounded-sm trans:bg focus:shadow-outline focus:outline-none py-2 px-4"
                        :class="loading ? 'cursor-not-allowed bg-grey-light' : 'bg-grey-darker hover:bg-grey-darkest'"
                        type="button"
                        @click="submitArchiveFolder"
                        :disabled="loading">
                        Archive
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
                loading: false
            }
        },

        computed: mapGetters([
            'getActiveFolder'
        ]),

        methods: {
            ...mapMutations([
                'setFoldersFlat',
                'setFoldersTree',
                'setActiveFolder'
            ]),

            openModalCloseMenu() {
                this.modalOpen = true;

                this.$emit('close-menu');
            },

            closeModal(el) {
                this.loading = this.modalOpen = false;

                this.newFolderTitle = this.getActiveFolder.title;
            },

            submitArchiveFolder() {
                this.loading = true;

                axios.delete(`/api/folder/${this.getActiveFolder.slug}/archive`).then(({ data }) => {
                    this.setFoldersFlat(data.foldersFlat);
                    this.setFoldersTree(data.foldersTree);
                    this.setActiveFolder(data.parentFolderSlug);
                    this.closeModal();
                    this.$router.push(`/f/${data.parentFolderSlug}`);
                });
            }
        }
    }
</script>
