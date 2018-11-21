<template>
    <div>
        <div class="flex justify-between mb-3">
            <h3 class="font-century text-lg text-grey">FOLDERS</h3>
            <svg class="icon text-grey spin-normal" v-show="loading">
                <use href="/svg/icons.svg#icon-circle" xlink:href="/svg/icons.svg#icon-circle"/>
            </svg>
        </div>
        <div ref="foldersTree">
            <folder-node 
                v-for="folder in getFoldersTree" 
                :key="folder.id" 
                :folder="folder"
                :loading-folder-id="loadingFolderId"/>
        </div>
        <new-folder-form/>
    </div>
</template>

<script>
    import FolderNode from './FolderNode.vue';
    import NewFolderForm from './NewFolderForm.vue';
    import { mapGetters, mapMutations } from 'vuex';
    import { Draggable } from '@shopify/draggable';

    export default {
        components: {
            FolderNode,
            NewFolderForm
        },

        data() {
            return {
                draggedFolderId: 0,
                dragOverFolderId: 0,
                loading: false,
                loadingFolderId: 0
            }
        },

        computed: mapGetters([
            'getFoldersTree',
            'getFolderById'
        ]),

        mounted() {
            this.setupDragEvents();
        },

        methods: {
            ...mapMutations([
                'setFoldersFlat',
                'setFoldersTree'
            ]),

            setupDragEvents() {
                this.draggable = new Draggable(this.$refs.foldersTree, {
                    draggable: '.folder-draggable',
                    delay: 300,
                    mirror: {
                        constrainDimensions: true
                    }
                });

                this.draggable.on('drag:start', (evt) => {
                    this.draggedFolderId = evt.originalSource.dataset.folderId;
                });

                this.draggable.on('drag:over', (evt) => {
                    this.dragOverFolderId = evt.data.over.dataset.folderId;
                });

                // @TODO: drag leave = dragOverFolderId set to 0

                this.draggable.on('drag:stop', this.postFolderUpdate);
            },

            postFolderUpdate() {
                this.loadingFolderId = this.dragOverFolderId;

                if (!this.folderUpdateValid()) {
                    this.loadingFolderId = 0;

                    return;
                }

                let data = {
                    folder_id: this.draggedFolderId,
                    new_parent_id: this.dragOverFolderId,
                };

                // @TODO: remove dragged el from folder tree?
                    
                axios.patch('/api/folder-order', data).then(({ data }) => {
                    this.setFoldersFlat(data.foldersFlat);
                    this.setFoldersTree(data.foldersTree);
                    this.loadingFolderId = 0;
                    this.$router.push(`/f/${data.updatedFolderSlug}`);
                });
            },

            folderUpdateValid() {
                let folderToMove = this.getFolderById(this.draggedFolderId);

                if (this.draggedFolderId === this.dragOverFolderId) {
                    console.log('Cannot add folder to itself!');
                    return false;
                }

                //  @TODO: Cannot add folder to nothing (drop outside any folder)
                //  drag leave in setupDragEvents = dragOverFolderId set to 0
                //  check if dragOverFolderId is 0

                if (folderToMove.parent_id == this.dragOverFolderId) {
                    console.log('Cannot add child to its parent!');
                    return false;
                }

                let match = folderToMove.children.filter((child) => {
                    return child.id == this.dragOverFolderId;

                    // @TODO: this only gets children one level deep 
                });

                if (match.length > 0) {
                    console.log('Cannot add parent to its children!');
                    return false;
                }

                return true;
            }
        }
    }
</script>
