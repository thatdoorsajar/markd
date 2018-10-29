<template>
    <div>
        <markd-navbar/>
        <div class="flex leading-normal" v-if="getFoldersFlat.length > 0">
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
            initUser:  Object,
            initFolderTop:  Object,
            initFoldersFlat:  Array,
            initFoldersTree:  Array,
        },

        computed: mapGetters([
            'getFoldersFlat'
        ]),

        mounted() {
            this.setUser(this.initUser);
            this.setFolderTop(this.initFolderTop);
            this.setFoldersFlat(this.initFoldersFlat);
            this.setFoldersTree(this.initFoldersTree);
        },

        methods: mapMutations([
            'setUser',
            'setFolderTop',
            'setFoldersFlat',
            'setFoldersTree'
        ])
    }
</script>
