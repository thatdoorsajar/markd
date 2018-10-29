<template>
    <div>
        <h3 class="font-century text-lg text-grey mb-4">FOLDERS</h3>
        <folder-tree v-for="folder in getAllFolders" :key="folder.id" :folder="folder"/>
        <new-folder-form/>
    </div>
</template>

<script>
    import FolderTree from './FolderTree.vue';
    import NewFolderForm from './NewFolderForm.vue';
    import { mapGetters } from 'vuex';

    export default {
        components: {
            FolderTree,
            NewFolderForm
        },

        computed: mapGetters([
            'getAllFolders'
        ])
    }
</script>
