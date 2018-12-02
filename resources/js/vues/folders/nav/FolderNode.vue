<template>
    <div v-if="!folder.top_folder">
        <div class="flex justify-between border-l-4 border-transparent rounded-sm leading-normal folder-draggable mb-2"
            :class="{
                'bg-grey-light border-teal': isActiveFolder && !getIsDragging,
                'hover:bg-grey-light': !getIsDragging
            }"
            :data-folder-id="folder.id">
            <router-link :to="`/f/${folder.slug}`" 
                class="w-full h-auto text-grey-darker font-semibold no-underline icon-text-aligner p-2 pr-3">
                <svg class="icon text-grey spin-normal mr-2" v-if="loading">
                    <use href="/svg/icons.svg#icon-circle" xlink:href="/svg/icons.svg#icon-circle"/>
                </svg>
                <template v-else>
                    <svg class="icon mr-2" v-if="isActiveFolder">
                        <use href="/svg/icons.svg#icon-folder-18-2" xlink:href="/svg/icons.svg#icon-folder-18-2"/>
                    </svg>
                    <svg class="icon mr-2" v-else>
                        <use href="/svg/icons.svg#icon-folder-15-2" xlink:href="/svg/icons.svg#icon-folder-15-2"/>
                    </svg>
                </template>
                <p>{{ folder.title }}</p>
            </router-link>
            <button class="text-grey-darker font-semibold hover:bg-teal trans:bg rounded-r-sm icon-text-aligner p-2 px-3"
                type="button"
                v-if="hasChildren"
                @click="showChildren = !showChildren">
                <svg class="icon trans:rotate" :class="{'rotate-180': showChildren}" v-if="hasChildren">
                    <use href="/svg/icons.svg#icon-stre-down-2" xlink:href="icons/icons.svg#icon-stre-down-2"/>
                </svg>
            </button>
        </div>
        <div class="ml-6" v-show="hasChildren && showChildren">
            <folder-node 
                v-for="folder in folder.children" 
                :key="folder.id" 
                :folder="folder"
                :loading-folder-id="loadingFolderId"/>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        name: 'folder-node',

        props: [
            'folder',
            'loadingFolderId'
        ],

        data() {
            return {
                isActiveFolder: false,
                showChildren: false,
                loading: false
            }
        },

        computed: {
            ...mapGetters([
                'getActiveFolder',
                'getIsDragging'
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

                    this.ifActiveChildOpenParents();
                }
            },

            loadingFolderId(id) {
                this.loading = (this.folder.id == id);
            }
        },

        mounted() {
            events.$on('open-parent', (parentId) => {
                if (this.folder.id == parentId) {
                    this.showChildren = true;
                    
                    if (this.folder.parent_id) {
                        events.$emit('open-parent', this.folder.parent_id);
                    }
                }
            });
        },

        methods: {
            ifActiveChildOpenParents() {
                if (this.folder.parent_id) {
                    events.$emit('open-parent', this.folder.parent_id);
                }
            }
        }
    }
</script>
