<template>
    <div>
        <div v-show="loading">
            <svg class="icon icon-xl icon-outline icon-stroke-3 text-grey spin-slow">
                <use href="/svg/icons.svg#icon-refresh-69" xlink:href="/svg/icons.svg#icon-refresh-69"/>
            </svg>
        </div>
        <div v-if="!loading && getActiveFolder.bookmarks.length > 0">
            <div v-for="bookmark in getActiveFolder.bookmarks" :key="bookmark.id"
                class="flex p-4 rounded hover:bg-teal-lighter"
                @mouseenter="mouseover = bookmark.id"
                @mouseleave="mouseover = null">
                <div class="w-1/10 mr-4 mb-0">
                    <a :href="`#/f/${getActiveFolder.slug}/bm/${bookmark.id}`" class="no-underline">
                        <img :src="bookmark.image_url" alt="Bookmark Image" class="rounded">
                    </a>
                </div>
                <div class="flex-1">
                    <p>
                        <a :href="`#/f/${getActiveFolder.slug}/bm/${bookmark.id}`" class="font-century font-semibold no-underline text-xl text-grey-darkest">
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
        <div class="flex mt-6">
            <div class="relative w-full">
                <input class="w-full h-auto font-century font-semibold text-base text-grey-darker bg-grey-light appearance-none border-2 border-grey-light rounded-l-sm focus:outline-none focus:bg-grey-lighter focus:border-teal focus:border-r-grey-light px-3 py-2"
                    type="text"
                    v-model="new_bookmark_url"
                    @keydown.enter="submitBookmarkUrl"
                    :class="{'opacity-50 cursor-not-allowed': processingUrl}">
                <div class="absolute" v-show="processingUrl" style="top: 50%; margin-top: -8px; right: 12px">
                    <svg class="icon text-grey spin-normal">
                        <use href="/svg/icons.svg#icon-circle" xlink:href="/svg/icons.svg#icon-circle"/>
                    </svg>
                </div>
            </div>
            <button class="font-century text-lg text-white rounded-r-sm focus:shadow-outline focus:outline-none py-2 px-4"
                :class="processingUrl ? 'cursor-not-allowed bg-grey-light' : 'bg-grey-darker hover:bg-grey-darkest'"
                type="button"
                @click="submitBookmarkUrl"
                :disabled="processingUrl">
                add
            </button>
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
