<template>
    <div>
        <div class="flex items-end text-grey mb-3">
            <h1 class="font-century text-xl2 text-grey-darkest leading-none mr-3">
                {{ getActiveFolder.title }}
            </h1>
            <folder-settings/>
        </div>
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
    import FolderSettings from './settings/FolderSettings.vue';
    import BookmarkIndex from '../bookmarks/BookmarkIndex.vue';
    import { mapGetters, mapMutations } from 'vuex';

    export default {
        components: {
            FolderSettings,
            BookmarkIndex
        },

        data() {
            return {
                loading: false
            }
        },

        computed: mapGetters([
            'getActiveFolder'
        ]),

        watch: {
            '$route': {
                immediate: true,

                handler(to, from) {
                    this.setActiveFolder(to.params.slug);
                }
            }
        },

        methods: mapMutations([
            'setActiveFolder'
        ])
    }
</script>
