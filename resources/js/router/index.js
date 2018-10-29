
/**
 * Setup & export VueRouter.
 */
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import FolderView from '../folders/FolderView.vue';
import BookmarkView from '../bookmarks/BookmarkView.vue';

export default new VueRouter({
    routes: [
        {
            path: '/',
            component: FolderView
        },
        {
            path: '/f/:slug?',
            component: FolderView
        },
        {
            path: '/f/:slug/bm/:id',
            component: BookmarkView
        }
    ]
});
