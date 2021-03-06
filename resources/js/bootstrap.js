
/**
 * Useful libraries.
 */
window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * Vue setup
 */
import Vue from 'vue';
import PortalVue from 'portal-vue';
Vue.use(PortalVue);
window.Vue = Vue;

/**
 * Create global Vue event bus.
 */
window.events = new Vue();

/**
 * Axios HTTP request setup.
 */
window.axios = require('axios');

window.axios.defaults.headers.common = {
    // 'Authorization': 'Bearer ' + window.Mrkd.jwtToken,
    'X-CSRF-TOKEN': window.Mrkd.csrfToken,
    'X-Requested-With': 'XMLHttpRequest',
    'CONTENT_TYPE': 'application/json'
};

window.axios.interceptors.request.use(function (config) {
    config.url = config.url+'?api_token='+window.Mrkd.apiToken;
    return config;
});

/**
 * Native string extension function to truncate and add ellipsis.
 * @param  {integer} charLimit
 * @return {string}
 */
String.prototype.trunc = function (charLimit) {
    return (this.length > charLimit) ? this.substr(0, charLimit - 1) + '...' : this;
};

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
