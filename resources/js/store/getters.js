
/**
 * Vuex getters should be used to retrieve items from the store,
 * rather than directly referencing the store state.
 */

// For User Object
export const getUser = (state) => state.user;

// For Folders
export const getFoldersFlat = (state) =>  state.foldersFlat;
export const getFoldersTree = (state) =>  state.foldersTree;
export const getFolderTop = (state) =>  state.foldersTree.find(f => f.top_folder == true);
export const getFolderBySlug = (state) => (slug) => state.foldersFlat.find(f => f.slug == slug);
export const getFolderById = (state) => (id) => state.foldersFlat.find(f => f.id == id);
export const getActiveFolder = (state) => state.activeFolder;

// For DragDrop Objects
export const getIsDragging = (state) => state.dragDrop.isDragging;
export const getDraggedFolderId = (state) => state.dragDrop.draggedFolderId;
export const getDragOverFolderId = (state) => state.dragDrop.dragOverFolderId;
