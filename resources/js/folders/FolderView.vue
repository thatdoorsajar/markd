<template>
    <div>
        <h3 class="font-century text-lg text-grey mb-4">BOOKMARKS {{ $route.params.slug }}</h3>
        <div v-if="!loading">
            <bookmark-index :folder="folder" :bookmarks="folder.bookmarks"/>
        </div>
        <div v-else>
            <svg class="icon icon-xl icon-outline icon-stroke-3 text-grey spin-slow">
                <use href="/svg/icons.svg#icon-refresh-69" xlink:href="/svg/icons.svg#icon-refresh-69"/>
            </svg>
        </div>
    </div>
</template>

<script>
    import BookmarkIndex from '../bookmarks/BookmarkIndex.vue';

    export default {
        components: {
            BookmarkIndex
        },

        data() {
            return {
                folder: {},
                loading: true
            }
        },

        watch: {
            '$route' (to, from) {
                this.fetchFolder(to);
            }
        },

        mounted() {
            this.fetchFolder(this.$route);
        },

        methods: {
            fetchFolder($router) {
                this.loading = true;
                let route = '';

                if (typeof $router.params.slug == 'undefined') {
                    route = '/api/folder';
                } else {
                    route = `/api/folder/${$router.params.slug}`;
                }

                axios.get(route).then((response) => {
                    this.folder = response.data.folder;
                    this.loading = false;
                });
            }
        }
    }
</script>
