
/**
 * Vuex mutations should be used to update items in the store,
 * rather than directly manipulating the store state.
 */

export const setUser = (state, user) => state.user = user;

export const setFoldersFlat = (state, folders) => state.foldersFlat = folders;

export const setFoldersTree = (state, folders) => state.foldersTree = folders;

export const setActiveFolder = (state, slug = null) => {
    if (slug) {
        return state.activeFolder = state.foldersFlat.find(f => f.slug == slug);
    } else {
        return state.activeFolder = state.foldersFlat.find(f => f.top_folder == true);
    }
}
