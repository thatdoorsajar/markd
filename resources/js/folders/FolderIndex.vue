<template>
    <div>
        <h3 class="font-century text-lg text-grey mb-4">FOLDERS</h3>
        <folder-tree v-for="folder in folders" :key="folder.id" :folder="folder"/>
        <new-folder-form/>
    </div>
</template>

<script>
    import FolderTree from './FolderTree.vue';
    import NewFolderForm from './NewFolderForm.vue';

    export default {
        components: {
            FolderTree,
            NewFolderForm
        },

        props: {
            initFolders: Array
        },

        data() {
            return {
                folders: this.initFolders
            }
        },

        mounted() {
            events.$on('update-folders', (folders) => this.folders = folders);
        }
    }
</script>
