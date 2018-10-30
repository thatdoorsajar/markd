<template>
    <on-click-outside :then="() => show = false">
        <div class="relative z-0">
            <button class="flex items-center focus:outline-none" 
                type="button"
                @click="show = !show">
                <svg class="icon hover:text-teal icon-lg text-grey trans:color">
                    <use href="/svg/icons.svg#icon-settings-gear" xlink:href="/svg/icons.svg#icon-settings-gear"/>
                </svg>
            </button>
            <div v-show="show" class="absolute pin-r border-2 shadow rounded bg-white mt-2">
                <ul class="w-40 list-reset font-sans font-semibold text-grey-darker">
                    <li class="hover:bg-grey-light rounded-t-sm">
                        <a href="#" class="flex text-grey-darker no-underline px-4 py-3">
                            <svg class="icon text-grey-darker mr-2"><use href="/svg/icons.svg#icon-folder-edit" xlink:href="/svg/icons.svg#icon-folder-edit"/></svg>
                            <span>edit folder</span>
                        </a>
                    </li>
                    <li class="hover:bg-grey-light">
                        <a href="#" class="flex text-grey-darker no-underline px-4 py-3">
                            <svg class="icon text-grey-darker mr-2"><use href="/svg/icons.svg#icon-c-add" xlink:href="/svg/icons.svg#icon-c-add"/></svg>
                            <span>sub folder</span>
                        </a>
                    </li>
                    <li class="hover:bg-grey-light">
                        <a href="#" class="flex text-grey-darker no-underline px-4 py-3">
                            <svg class="icon text-grey-darker mr-2"><use href="/svg/icons.svg#icon-box" xlink:href="/svg/icons.svg#icon-box"/></svg>
                            <span>archive</span>
                        </a>
                    </li>
                    <li class="hover:bg-grey-light rounded-b-sm">
                        <a href="#" class="flex text-red no-underline px-4 py-3" @click.prevent="modalOpen = true">
                            <svg class="icon text-red mr-2"><use href="/svg/icons.svg#icon-trash-can" xlink:href="/svg/icons.svg#icon-trash-can"/></svg>
                            <span>delete</span>
                        </a>
                    </li>
                </ul>
            </div>
            <example-modal :show="modalOpen" @close="modalOpen = false"/>
        </div>
    </on-click-outside>
</template>

<script>
    import ExampleModal from './ExampleModal.vue';
    import { mapGetters } from 'vuex';

    export default {
        components: {
            ExampleModal
        },

        data() {
            return {
                show: false,
                modalOpen: false
            }
        },

        computed: mapGetters([
            'getActiveFolder'
        ])
    }
</script>
