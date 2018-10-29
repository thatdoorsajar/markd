<template>
    <div>
        <h3 class="font-century text-lg text-grey mb-4">BOOKMARKS {{ $route.params.slug }}</h3>
        <div v-if="!loading">
            <bookmark-index :folder="getFolder(9)" :bookmarks="getFolder(9).bookmarks"/>
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
    import { mapGetters } from 'vuex';

    export default {
        components: {
            BookmarkIndex
        },

        data() {
            return {
                loading: true
            }
        },

        computed: mapGetters([
            'getFolder',
            'getTopFolder'
        ]),

        watch: {
            '$route' (to, from) {
                // this.fetchFolder(to);
            }
        },

        mounted() {
            this.loading = false;
        }
    }
</script>
