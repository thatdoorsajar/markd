<template>
    <div v-if="!folder.top_folder">
        <router-link :to="`/f/${folder.slug}`" class="w-full h-auto flex justify-between border-l-4 border-transparent hover:bg-grey-light rounded-sm text-grey-darker font-semibold no-underline icon-text-aligner p-2 pr-3 mb-2" 
            :class="{'bg-grey-light border-teal-lighter': isActiveFolder}">
            <p>{{ folder.title }}</p>
            <svg class="icon trans:rotate" :class="{'rotate-180': isActiveFolder}" v-if="hasChildren">
                <use href="/svg/icons.svg#icon-stre-down-2" xlink:href="icons/icons.svg#icon-stre-down-2"/>
            </svg>
        </router-link>
        <div class="ml-6" v-if="hasChildren && isActiveFolder">
            <folder-tree v-for="folder in folder.children" :key="folder.id" :folder="folder"/>
            <new-folder-form :parent_id="folder.id"/>
        </div>
    </div>
</template>

<script>
    import NewFolderForm from './NewFolderForm.vue';
    import { mapGetters } from 'vuex';

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
                isActiveFolder: false
            }
        },

        computed: {
            ...mapGetters([
                'getActiveFolder'
            ]),

            hasChildren() {
                return this.folder.children.length > 0;
            }
        },

        watch: {
            getActiveFolder() {
                if (this.folder.slug != this.$route.params.slug) {
                    this.isActiveFolder = false;
                } else {
                    this.isActiveFolder = true;
                }
            }
        }
    }
</script>
