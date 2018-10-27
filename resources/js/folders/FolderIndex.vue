<template>
    <div>
        <folder-tree v-for="folder in folders" :key="folder.id" :folder="folder"/>
    </div>
</template>

<script>
    import FolderTree from './FolderTree.vue';

    export default {
        components: {
            FolderTree
        },

        props: {
            folders: Array
        },

        data() {
            return {
                yeah: true
            }
        },

        mounted() {

        },

        methods: {
            methodOne() {

            }
        }
    }
</script>
