
/**
 * Vuex getters should be used to retrieve items from the store,
 * rather than directly referencing the store state.
 */
export const getUser = (state) => state.user;

export const getAllFolders = (state) =>  state.folders;

export const getFoldersWithoutTop = ({ folders }) =>  folders.splice(folders.findIndex(f => f.top_folder != true), 1);

export const getTopFolder = (state) =>  state.folders.find(f => f.top_folder == true);

export const getFolder = (state) => (id) => {
    return state.folders.find(f => f.id == id);
}
