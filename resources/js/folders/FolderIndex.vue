<template>
    <div>
        <h3 class="font-century text-lg text-grey mb-4">FOLDERS</h3>
        <div id="folderSortable">
            <folder-tree v-for="folder in getFoldersTree" 
                :key="folder.id" 
                :folder="folder"
                :close-children-init="closeChildrenId"/>
        </div>
        <new-folder-form/>
    </div>
</template>

<script>
    import FolderTree from './FolderTree.vue';
    import NewFolderForm from './NewFolderForm.vue';
    import { mapGetters } from 'vuex';
    import { Draggable } from '@shopify/draggable';

    export default {
        components: {
            FolderTree,
            NewFolderForm
        },

        data() {
            return {
                draggedEl: {},
                lastDragOverContainer: {},
                lastDragOverEl: {},
                draggedFolderId: 0
            }
        },

        computed: mapGetters([
            'getFoldersTree'
        ]),

        mounted() {
            this.draggable = new Draggable(document.getElementById('folderSortable'), {
                draggable: '.folder-draggable',
                delay: 300,
                mirror: {
                    constrainDimensions: true
                }
            });

            this.draggable.on('drag:start', (evt) => {
                console.log('drag:start');
                // console.log(evt);
                this.draggedEl = evt.originalSource;
                this.draggedFolderId = this.draggedEl.dataset.folder;
            });

            this.draggable.on('drag:over', (evt) => {
                console.log('drag:over');
                // console.log(evt);
                this.lastDragOverContainer = evt.data.overContainer;
                this.lastDragOverEl = evt.data.over;
            });

            this.draggable.on('drag:stop', (evt) => {
                console.log('drag:stop');
                // console.log(evt);
                console.log(this.draggedEl, this.lastDragOverContainer, this.lastDragOverEl);
            });
        },

        methods: {
            doSomething() {
                console.log('made it!');
            }
        }
    }
</script>
