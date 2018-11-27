<template>
    <div>
        <div v-show="loading">
            <svg class="icon icon-xl icon-outline icon-stroke-3 text-grey spin-slow">
                <use href="/svg/icons.svg#icon-refresh-69" xlink:href="/svg/icons.svg#icon-refresh-69"/>
            </svg>
        </div>
        <div v-if="!loading && getActiveFolder.bookmarks.length > 0">
            <div v-for="(bookmark, index) in getActiveFolder.bookmarks" :key="bookmark.id"
                class="flex p-4 rounded hover:bg-grey-light"
                @mouseenter="mouseover = bookmark.id"
                @mouseleave="mouseover = null">
                <div class="w-1/10 mr-4 mb-0">
                    <a :href="`#/f/${getActiveFolder.slug}/bm/${bookmark.id}`" class="no-underline">
                        <img :src="`/img/example-thumb${++index}.jpg`" 
                            alt="Bookmark Image" 
                            class="rounded w-24">
                    </a>
                </div>
                <div class="flex-1">
                    <p>
                        <a :href="`#/f/${getActiveFolder.slug}/bm/${bookmark.id}`" 
                            class="font-century font-semibold no-underline text-2xl text-grey-darkest trans:color">
                            {{ bookmark.title && bookmark.title.trunc(40) }}
                        </a>
                    </p>
                    <p class="mb-2">
                        <a :href="bookmark.url_resolved" 
                            class="no-underline text-grey-dark hover:text-grey-darkest trans:color">
                            {{ bookmark.url_resolved }}
                        </a>
                    </p>
                    <div v-if="mouseover == bookmark.id">
                        <a :href="bookmark.url_resolved" target="_blank">
                            <svg class="icon icon-lg text-grey-dark hover:text-grey-darkest trans:color">
                                <use href="/svg/icons.svg#icon-square-corner-up-right" xlink:href="/svg/icons.svg#icon-square-corner-up-right"/>
                            </svg>
                        </a>
                    </div>
                    <p class="text-lg text-grey-darker" v-else>
                        {{ bookmark.description && bookmark.description.trunc(80) }}
                    </p>
                </div>
                <!-- <div class="w-1/10 text-right" v-show="mouseover == bookmark.id">
                    <a :href="bookmark.url_resolved" target="_blank" class="mr-2">
                        <svg class="icon icon-lg text-grey-dark hover:text-grey-darkest trans:color">
                            <use href="/svg/icons.svg#icon-menu-5" xlink:href="/svg/icons.svg#icon-menu-5"/>
                        </svg>
                    </a>
                </div> -->
            </div>
        </div>
        <div v-else>
            Drag you bookmarks here...
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapMutations } from 'vuex';

    export default {
        data() {
            return {
                loading: false,
                processingUrl: false,
                mouseover: null,
                new_bookmark_url: ''
            }
        },

        computed: mapGetters([
            'getActiveFolder'
        ]),

        methods: {
            ...mapMutations([
                'setFoldersFlat',
                'setActiveFolder'
            ]),

            submitBookmarkUrl() {
                let data = {
                    new_bookmark_url: this.new_bookmark_url,
                    parent_folder_id: this.getActiveFolder.id
                };

                this.processingUrl = true;

                axios.post('/api/bookmark', data).then(({ data }) => {
                    this.setFoldersFlat(data.foldersFlat);
                    this.setActiveFolder(this.getActiveFolder.slug);
                    this.new_bookmark_url = '';
                    this.processingUrl = false;
                });
            }
        }
    }
</script>
