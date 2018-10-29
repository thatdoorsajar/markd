
/**
 * Vuex mutations should be used to update items in the store,
 * rather than directly manipulating the store state.
 */

export const setUser = (state, user) => state.user = user;

export const setFolderTop = (state, folder) => state.folderTop = folder;

export const setFoldersFlat = (state, folders) => state.foldersFlat = folders;

export const setFoldersTree = (state, folders) => state.foldersTree = folders;
