<template>
    <div>
        <a href="#" class="w-full h-auto flex justify-between border-l-4 border-transparent hover:bg-grey-light rounded-sm text-grey-darker font-semibold no-underline icon-text-aligner p-2 mb-2" 
            @click="showChildren = !showChildren"
            @mouseenter="mouseover = true"
            @mouseleave="mouseover = false">
            <p>{{ folder.title }}</p>
            <svg class="icon trans:rotate" :class="{'rotate-180': showChildren}" v-if="hasChildren">
                <use href="/svg/icons.svg#icon-stre-down-2" xlink:href="icons/icons.svg#icon-stre-down-2"/>
            </svg>
        </a>
        <div class="ml-6" v-if="hasChildren && showChildren">
            <folder-tree v-for="folder in folder.children" :key="folder.id" :folder="folder"/>
            <new-folder-form :parent_id="folder.id"/>
        </div>
        
        <!-- <div class="w-full h-auto bg-grey-lighter border-l-4 border-teal-lighter hover:bg-grey-light rounded-sm px-2 py-1 mb-2">
            Top Folder
        </div> -->
        <!-- <div class="w-full h-auto border-l-4 border-transparent hover:bg-grey-light rounded-sm px-2 py-1 mb-2">
            Jest
        </div> -->
    </div>
</template>

<script>
    import NewFolderForm from './NewFolderForm.vue';

    export default {
        name: 'folder-tree',

        components: {
            NewFolderForm
        },

        props: {
            folder: Object
        },

        data() {
            return {
                showChildren: false,
                mouseover: false
            }
        },

        computed: {
            hasChildren() {
                return this.folder.children.length > 0;
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
