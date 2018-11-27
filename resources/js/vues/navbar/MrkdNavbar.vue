<template>
    <div>
        <nav class="flex items-center justify-between bg-white border-grey-lighter py-4 px-8">
            <div class="w-1/4">
                <router-link to="/" class="font-century font-bold text-3xl text-grey-dark hover:text-teal trans:color no-underline">
                    <!-- grey-80 hover:grey-0 -->
                    <!-- <img src="/svg/logo-plain.svg" alt="Mrkd Logo" width="120"> -->
                    marked
                </router-link>
            </div>
            <div class="w-3/4 flex justify-end">
                <search-bookmarks :search-active="searchActive"/>
                <new-bookmark-form v-show="!searchActive"/>
                <user-menu :user="'user'"/>
            </div>
        </nav>
    </div>
</template>

<script>
    import SearchBookmarks from './SearchBookmarks.vue';
    import NewBookmarkForm from './NewBookmarkForm.vue';
    import UserMenu from './UserMenu.vue';

    export default {
        components: {
            SearchBookmarks,
            NewBookmarkForm,
            UserMenu
        },

        data() {
            return {
                searchActive: false
            }
        },

        mounted() {
            events.$on('search:bookmarks', bool => this.searchActive = bool);
        },

        methods: {
            
        }
    }
</script>
