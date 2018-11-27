<template>
    <div class="inline">
        <!-- <a href="#" 
            class="flex text-grey-darker no-underline px-4 py-3"
            @click.prevent="openModalCloseDropDown">
            <svg class="icon text-grey-darker mr-2"><use href="/svg/icons.svg#icon-box" xlink:href="/svg/icons.svg#icon-box"/></svg>
            <span>archive</span>
        </a> -->
        <button class="font-semibold text-grey hover:text-teal trans:color focus:outline-none"
            @click="openModalCloseDropDown">
            archive
        </button>
        <abstract-modal 
            :show="modalOpen" 
            @close="modalOpen = false">
            <template slot="title">Archive Folder?</template>
            <template>
                <p class="font-sans text-lg text-grey-darkest mb-6">
                    // input
                </p>
                <div class="flex justify-between">
                    <button class="font-century text-lg text-grey-dark hover:text-grey-darkest trans:bg focus:shadow-outline focus:outline-none py-2 px-4 mr-2"
                        type="button"
                        @click="modalOpen = false">
                        Cancel
                    </button>
                    <button class="font-century text-lg text-white rounded-sm bg-grey-darker hover:bg-grey-darkest trans:bg focus:shadow-outline focus:outline-none py-2 px-4"
                        type="button"
                        @click="modalOpen = false">
                        Archive
                    </button>
                </div>
            </template>
        </abstract-modal>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        data() {
            return {
                modalOpen: false,
                loading: false
            }
        },

        computed: mapGetters([
            'getActiveFolder'
        ]),

        methods: {
            openModalCloseDropDown() {
                this.modalOpen = true;

                this.$emit('close-menu');
            }
        }
    }
</script>
