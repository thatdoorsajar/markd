<template>
    <div>
        <h3 class="font-century text-lg text-grey mb-4">FOLDERS</h3>
        <folder-tree v-for="folder in folders" :key="folder.id" :folder="folder"/>
        <button class="flex border-l-4 border-transparent font-semibold text-teal-light hover:text-grey-darker trans:color icon-text-aligner focus:outline-none p-2"
            v-show="!showForm"
            @click="openNewFolderForm">
            <svg class="icon"><use href="/svg/icons.svg#icon-c-add" xlink:href="/svg/icons.svg#icon-c-add"/></svg>
            &nbsp;add
        </button>
        <input class="w-full h-auto bg-grey-light appearance-none border-2 border-grey-light rounded-sm text-base text-grey-darker font-semibold focus:outline-none focus:bg-grey-lighter focus:border-teal px-3 py-2"
            type="text" 
            v-model="newFolderTitle"
            v-show="showForm" 
            ref="folderForm"
            @blur="closeNewFolderForm"
            @keydown.esc="closeNewFolderForm"
            @keydown.enter="submitNewFolder">
    </div>
</template>

<script>
    import FolderTree from './FolderTree.vue';

    export default {
        components: {
            FolderTree
        },

        props: {
            initFolders: Array
        },

        data() {
            return {
                folders: this.initFolders,
                showForm: false,
                newFolderTitle: ''
            }
        },

        mounted() {
            this.$on('update:folders', (folders) => this.folders = folders);
        },

        methods: {
            openNewFolderForm(el) {
                this.showForm = true;

                this.$nextTick(() => this.$refs.folderForm.focus())
            },

            closeNewFolderForm(el) {
                this.showForm = false;

                this.newFolderTitle = '';
            },

            submitNewFolder() {
                // @TODO: sanitise entry?
                
                let route = '/api/folder';
                let data = {
                    parent_id: null,
                    folder_title: this.newFolderTitle
                };

                axios.post(route, data).then((response) => {
                    this.$emit('update:folders', response.data.folders);
                });
            }
        }
    }
</script>
