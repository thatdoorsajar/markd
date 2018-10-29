<template>
    <div>
        <div v-show="loading">
            <svg class="icon icon-xl icon-outline icon-stroke-3 text-grey spin-slow">
                <use href="/svg/icons.svg#icon-refresh-69" xlink:href="/svg/icons.svg#icon-refresh-69"/>
            </svg>
        </div>
        <div v-if="!loading && folder.bookmarks.length > 0">
            <div v-for="bookmark in folder.bookmarks" :key="bookmark.id"
                class="flex p-4 rounded hover:bg-teal-lighter"
                @mouseenter="mouseover = bookmark.id"
                @mouseleave="mouseover = null">
                <div class="w-1/10 mr-4 mb-0">
                    <a :href="`#/f/${folder.slug}/bm/${bookmark.id}`" class="no-underline">
                        <img :src="bookmark.meta_image_url" alt="Bookmark Image" class="rounded">
                    </a>
                </div>
                <div class="flex-1">
                    <p>
                        <a :href="`#/f/${folder.slug}/bm/${bookmark.id}`" class="font-century font-semibold no-underline text-xl text-grey-darkest">
                            {{ bookmark.title }}
                        </a>
                    </p>
                    <p class="mb-2">
                        <a :href="bookmark.url_resolved" class="no-underline text-grey hover:text-grey-darkest">
                            {{ bookmark.url_resolved }}
                        </a>
                    </p>
                    <p class="leading-none text-grey-darker">
                        {{ bookmark.meta_description }}
                    </p>
                </div>
                <div class="w-1/10 text-right" v-show="mouseover == bookmark.id">
                    <a :href="bookmark.url_resolved" target="_blank" class="mr-2">
                        <svg class="icon icon-lg text-grey hover:text-grey-darkest">
                            <use href="/svg/icons.svg#icon-menu-5" xlink:href="/svg/icons.svg#icon-menu-5"/>
                        </svg>
                    </a>
                    <a :href="bookmark.url_resolved" target="_blank">
                        <svg class="icon icon-lg text-grey hover:text-grey-darkest">
                            <use href="/svg/icons.svg#icon-square-corner-up-right" xlink:href="/svg/icons.svg#icon-square-corner-up-right"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div v-else>
            Drag you bookmarks here...
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        data() {
            return {
                folder: {},
                loading: true,
                mouseover: null,
            }
        },

        computed: mapGetters([
            'getFolder'
        ]),

        watch: {
            '$route' (to, from) {
                this.loading = true;

                
            }
        },
    }
</script>
