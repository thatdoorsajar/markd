<template>
    <div>
        <h3 class="font-century text-lg text-grey mb-4">BOOKMARKS {{ $route.params.slug }}</h3>
        <div v-if="!loading">
            <bookmark-index/>
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
                loading: false
            }
        }
    }
</script>
