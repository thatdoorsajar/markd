
/**
 * Bootstrap JS setup.
 */
require('./bootstrap');

/**
 * Vue top level component setup.
 */
Vue.component('folder-index', require('./folders/FolderIndex.vue'));
Vue.component('drag-over', require('./components/DragOver.vue'));

/**
 * Vue-router setup.
 */
const router = new VueRouter({
    routes: [
        { 
            path: '/',
            component: require('./folders/FolderView.vue')
        },
        { 
            path: '/f/:slug?',
            component: require('./folders/FolderView.vue')
        },
        { 
            path: '/f/:slug/bm/:id',
            component: require('./bookmarks/BookmarkView.vue')
        }
    ]
})

/**
 * Start the Vue app.
 */
const app = new Vue({
    el: '#app',
    router
});
