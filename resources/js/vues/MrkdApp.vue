<template>
    <div>
        <mrkd-navbar/>
        <div class="flex" v-if="getFoldersFlat.length > 0">
            <div class="w-1/4">
                <section class="font-sans pt-3 p-8 pr-4">
                    <main-nav/>
                    <folder-index/>
                </section>
            </div>
            <div class="w-3/4">
                <section class="font-sans pt-2 p-8">
                    <router-view/>
                </section>
            </div>
        </div>
        <portal-target name="modals"/>
    </div>
</template>

<script>
    import MrkdNavbar from './navbar/MrkdNavbar.vue';
    import MainNav from './mainnav/MainNav.vue';
    import FolderIndex from './folders/nav/FolderIndex.vue';
    import { mapGetters, mapMutations } from 'vuex';

    export default {
        components: {
            MrkdNavbar,
            MainNav,
            FolderIndex
        },

        props: {
            initUser:  Object,
            initFoldersFlat:  Array,
            initFoldersTree:  Array,
        },

        computed: mapGetters([
            'getFoldersFlat'
        ]),

        mounted() {
            this.setUser(this.initUser);
            this.setFoldersFlat(this.initFoldersFlat);
            this.setFoldersTree(this.initFoldersTree);
        },

        methods: mapMutations([
            'setUser',
            'setFoldersFlat',
            'setFoldersTree'
        ])
    }
</script>
