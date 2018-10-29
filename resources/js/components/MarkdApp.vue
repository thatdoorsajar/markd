<template>
    <div>
        <markd-navbar/>
        <div class="flex leading-normal" v-if="getAllFolders.length > 0">
            <div class="w-1/4">
                <section class="font-sans p-8 pr-4">
                    <folder-index/>
                </section>
            </div>
            <div class="w-3/4">
                <section class="font-sans p-8">
                    <router-view/>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
    import MarkdNavbar from '../components/MarkdNavbar.vue';
    import FolderIndex from '../folders/FolderIndex.vue';
    import { mapGetters, mapMutations } from 'vuex';

    export default {
        components: {
            MarkdNavbar,
            FolderIndex
        },

        props: {
            initUser: {
                type: Object,
                default: {}
            },

            initFolders: {
                type: Array,
                default: [],
            }
        },

        computed: mapGetters([
            'getAllFolders'
        ]),

        mounted() {
            this.setUser(this.initUser);
            this.setFolders(this.initFolders);
        },

        methods: mapMutations([
            'setUser',
            'setFolders'
        ])
    }
</script>
