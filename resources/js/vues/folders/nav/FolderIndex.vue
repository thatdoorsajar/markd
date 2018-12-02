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
                v-for="folder in getFoldersTree[0].children" 
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
                loading: false,
                loadingFolderId: 0
            }
        },

        computed: mapGetters([
            'getFoldersTree',
            'getFolderById',
            'getIsDragging',
            'getDraggedFolderId',
            'getDragOverFolderId'
        ]),

        mounted() {
            this.setupDragEvents();
        },

        methods: {
            ...mapMutations([
                'setFoldersFlat',
                'setFoldersTree',
                'setIsDragging',
                'setDraggedFolderId',
                'setDragOverFolderId'
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
                    this.setIsDragging(true);
                    this.setDraggedFolderId(evt.originalSource.dataset.folderId);
                });

                this.draggable.on('drag:over', (evt) => {
                    this.setIsDragging(false);
                    this.setDragOverFolderId(evt.data.over.dataset.folderId);

                    if (!this.folderUpdateValid()) {
                        // console.log('Invalid: ', evt);
                        // Set on state the ID of the invalid folder
                        this.folderOverDom = evt.over;
                        evt.over.classList.remove('draggable--over');
                        evt.over.classList.add('draggable--invalid');
                    }
                });

                this.draggable.on('drag:out', (evt) => {
                    // Remove on state the ID of the invalid folder
                    evt.over.classList.remove('draggable--invalid');
                });

                // @TODO: drag leave = state.dragOverFolderId set to 0

                this.draggable.on('drag:stop', (evt) => {
                    this.postFolderUpdate();
                    this.folderOverDom.classList.remove('draggable--invalid');
                    // Remove on state the ID of the invalid folder
                    console.log('Stop: ', evt);
                });
            },

            postFolderUpdate() {
                this.loadingFolderId = this.getDragOverFolderId;

                if (!this.folderUpdateValid()) {
                    this.loadingFolderId = 0;

                    return;
                }

                let data = {
                    folder_id: this.getDraggedFolderId,
                    new_parent_id: this.getDragOverFolderId,
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
                let folderToMove = this.getFolderById(this.getDraggedFolderId);

                if (this.getDraggedFolderId === this.getDragOverFolderId) {
                    console.log('Cannot add folder to itself!');
                    return false;
                }

                //  @TODO: Cannot add folder to nothing (drop outside any folder)
                //  drag leave in setupDragEvents = state.dragOverFolderId set to 0
                //  check if state.dragOverFolderId is 0

                if (folderToMove.parent_id == this.getDragOverFolderId) {
                    console.log('Cannot add child to its parent!');
                    return false;
                }

                let match = folderToMove.children.filter((child) => {
                    return child.id == this.getDragOverFolderId;

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
