
/**
 * Vuex mutations should be used to update items in the store,
 * rather than directly manipulating the store state.
 */

// For User Object
export const setUser = (state, user) => state.user = user;

// For Folders
export const setFoldersFlat = (state, folders) => state.foldersFlat = folders;
export const setFoldersTree = (state, folders) => state.foldersTree = folders;

export const setActiveFolder = (state, slug = null) => {
    if (slug) {
        return state.activeFolder = state.foldersFlat.find(f => f.slug == slug);
    } else {
        return state.activeFolder = state.foldersFlat.find(f => f.top_folder == true);
    }
}

// For DragDrop Objects
export const setIsDragging = (state, boolean) => state.dragDrop.isDragging = boolean;
export const setDraggedFolderId = (state, folderId) => state.dragDrop.draggedFolderId = folderId;
export const setDragOverFolderId = (state, folderId) => state.dragDrop.dragOverFolderId = folderId;
