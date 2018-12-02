
/**
 * Setup & export VueRouter.
 */
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import FolderView from '../vues/folders/FolderView.vue';
import BookmarkView from '../vues/bookmarks/BookmarkView.vue';

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: FolderView
        },
        {
            path: '/archived',
            name: 'archived',
            component: FolderView
        },
        {
            path: '/marked',
            name: 'marked',
            component: FolderView
        },
        {
            path: '/f/:slug?',
            name: 'folder',
            component: FolderView
        },
        {
            path: '/f/:slug/bm/:id',
            name: 'bookmark',
            component: BookmarkView
        }
    ]
});
