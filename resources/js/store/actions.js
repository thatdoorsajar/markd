
/**
 * Vuex actions is where any asynchronous behavior should live (API calls).
 * You can "commit" mutations to the state or "dispatch" other actions.
 * 
 */
import axios from 'axios';

export const fetchFolders = ({ commit, dispatch }, payLoad) => {
    axios.get('/api/folder').then((response) => {
        console.log(response.data);

        commit('setFolders', response.data.folders);
    });
}
