<template>
    <div>
        <h3 class="font-century text-lg text-grey mb-4">BOOKMARKS {{ $route.params.slug }}</h3>
        <div v-if="!loading">
            <ul>
                <li v-for="bookmark in folder.bookmarks" :key="bookmark.id">{{ bookmark.title }}</li>
            </ul>
        </div>
        <div v-else>
            <svg class="icon icon-xl icon-outline icon-stroke-3 text-grey spin-slow">
                <use href="/svg/icons.svg#icon-refresh-69" xlink:href="/svg/icons.svg#icon-refresh-69"/>
            </svg>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                folder: {},
                loading: true
            }
        },

        // beforeRouteUpdate(to, from, next) {
        //     this.loading = true;

        //     next();
        // },

        watch: {
            '$route' (to, from) {
                this.fetchFolder(to);
            }
        },

        mounted() {
            this.fetchFolder(this.$route);
        },

        methods: {
            fetchFolder(route) {
                this.loading = true;

                axios.get(`/api/folder/${route.params.slug}`).then((response) => {
                    this.folder = response.data.folder;
                    this.loading = false;
                });
            }
        }
    }
</script>
