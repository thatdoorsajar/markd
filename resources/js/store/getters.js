
/**
 * Vuex getters should be used to retrieve items from the store,
 * rather than directly referencing the store state.
 */
export const getUser = (state) => state.user;

export const getFoldersFlat = (state) =>  state.foldersFlat;

export const getFoldersTree = (state) =>  state.foldersTree;

export const getFolderTop = (state) =>  state.foldersTree.find(f => f.top_folder == true);

export const getFolderBySlug = (state) => (slug) => state.foldersFlat.find(f => f.slug == slug);

export const getFolderById = (state) => (id) => state.foldersFlat.find(f => f.id == id);

export const getActiveFolder = (state) => state.activeFolder;
