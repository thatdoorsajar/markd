<template>
    <on-click-outside :then="() => showDropDown = false">
        <div class="relative z-0">
            <button class="flex items-center focus:outline-none" 
                type="button"
                @click="showDropDown = !showDropDown">
                <svg class="icon hover:text-teal icon-lg text-grey trans:color">
                    <use href="/svg/icons.svg#icon-settings-gear" xlink:href="/svg/icons.svg#icon-settings-gear"/>
                </svg>
            </button>
            <div v-show="showDropDown" class="absolute pin-r border-2 shadow rounded bg-white mt-2">
                <ul class="w-40 list-reset font-sans font-semibold text-grey-darker">
                    <li class="hover:bg-grey-light rounded-t-sm">
                        <edit-title/>
                    </li>
                    <li class="hover:bg-grey-light">
                        <add-sub-folder/>
                    </li>
                    <li class="hover:bg-grey-light">
                        <archive-folder/>
                    </li>
                    <li class="hover:bg-grey-light rounded-b-sm">
                        <delete-folder/>
                    </li>
                </ul>
            </div>
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
                showDropDown: false,
                titleModalOpen: false,
                addSubModalOpen: false,
                archiveModalOpen: false,
                deleteModalOpen: false
            }
        },

        computed: mapGetters([
            'getActiveFolder'
        ])
    }
</script>
