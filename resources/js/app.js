
/**
 * Bootstrap JS setup.
 */
require('./bootstrap');

/**
 * Vue top level component setup.
 */
Vue.component('markd-app', require('./components/MarkdApp.vue'));

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
