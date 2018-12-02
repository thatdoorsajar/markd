
/**
 * Vuex state is where any app wide data should be defined.
 */
export default {
    user: {},
    activeFolder: {},
    foldersFlat: [],
    foldersTree: [],
    folders: {
        active: {},
        flat: [],
        tree: []
    },
    dragDrop: {
        isDragging: false,
        draggedFolderId: 0,
        dragOverFolderId: 0
    }
}
