
/**
 * Vuex mutations should be used to update items in the store,
 * rather than directly manipulating the store state.
 */

export const setUser = (state, user) => state.user = user;

export const setFolders = (state, folders) => state.folders = folders;
