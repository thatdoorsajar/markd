<template>
    <div>
        <markd-navbar/>
        <div class="flex" v-if="getFoldersFlat.length > 0">
            <div class="w-1/4">
                <section class="font-sans leading-normal p-8 pr-4">
                    <folder-index/>
                </section>
            </div>
            <div class="w-3/4">
                <section class="font-sans p-8">
                    <router-view/>
                </section>
            </div>
        </div>
        <portal-target name="folderTitleModal"/>
        <portal-target name="folderSubFolderModal"/>
        <portal-target name="folderArchiveModal"/>
        <portal-target name="folderDeleteModal"/>
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
