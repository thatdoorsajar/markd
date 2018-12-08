<template>
    <on-click-outside :then="() => editMenuOpen = false">
        <div class="pl-1">
            <button class="font-semibold text-grey hover:text-teal trans:color focus:outline-none"
                v-show="!editMenuOpen"
                @click="editMenuOpen = true">
                edit
            </button>
            <transition name="fade">
            <div v-show="editMenuOpen">
                <edit-title @close-menu="editMenuOpen = false"/>
                &nbsp;·&nbsp;
                <add-sub-folder @close-menu="editMenuOpen = false"/>
                &nbsp;·&nbsp;
                <archive-folder @close-menu="editMenuOpen = false"/>
                &nbsp;·&nbsp;
                <delete-folder @close-menu="editMenuOpen = false"/>
            </div>
        </transition>
        </div>
    </on-click-outside>
</template>

<script>
    import EditTitle from './EditTitle.vue';
    import AddSubFolder from './AddSubFolder.vue';
    import ArchiveFolder from './ArchiveFolder.vue';
    import DeleteFolder from './DeleteFolder.vue';
    import { mapGetters } from 'vuex';

    export default {
        components: {
            EditTitle,
            AddSubFolder,
            ArchiveFolder,
            DeleteFolder
        },

        data() {
            return {
                editMenuOpen: false
            }
        },

        mounted() {

        },

        methods: {
            methodOne() {

            }
        }
    }
</script>
