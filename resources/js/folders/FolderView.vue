<template>
    <div>
        <div class="flex justify-between mb-4">
            <h3 class="font-century text-lg text-grey">{{ getActiveFolder.title }} marks</h3>
            <!-- <div class="flex items-center"> -->
                <!-- <button type="button" class="flex items-center focus:outline-none mr-3"
                    @click="viewFormat = 'card'">
                    <svg class="icon hover:text-teal trans:color" 
                        :class="viewFormat == 'card' ? 'text-grey-dark' : 'text-grey'">
                        <use href="/svg/icons.svg#icon-grid-interface" xlink:href="/svg/icons.svg#icon-grid-interface"/>
                    </svg>
                </button>
                <button type="button" class="flex items-center focus:outline-none mr-3"
                    @click="viewFormat = 'list'">
                    <svg class="icon hover:text-teal trans:color" 
                        :class="viewFormat == 'list' ? 'text-grey-dark' : 'text-grey'">
                        <use href="/svg/icons.svg#icon-bullet-list-70" 
                            xlink:href="/svg/icons.svg#icon-bullet-list-70"/>
                    </svg>
                </button> -->
                <folder-settings/>
            <!-- </div> -->
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
                loading: false,
                viewFormat: 'list'
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
