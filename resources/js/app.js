
/**
 * Bootstrap JS setup.
 */
require('./bootstrap');

/**
 * Vue top level component setup.
 */
Vue.component('mrkd-app', require('./vues/MrkdApp.vue'));

/**
 * Vue helper components import.
 */
Vue.component('abstract-modal', require('./vues/components/AbstractModal.vue'));
Vue.component('on-click-outside', require('./vues/components/OnClickOutside.vue'));

/**
 * Vuex state management setup.
 */
import store from './store';

/**
 * VueRouter routing setup.
 */
import router from './router';

/**
 * Start the Vue app.
 */
const app = new Vue({
    el: '#app',
    store,
    router
});
