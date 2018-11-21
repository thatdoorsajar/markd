<template>
    <div>
        <nav class="flex items-center justify-between bg-white border-grey-lighter py-4 px-8">
            <div class="w-1/4">
                <router-link to="/" class="font-century font-bold text-3xl text-grey-dark hover:text-teal trans:color no-underline">
                    <!-- grey-80 hover:grey-0 -->
                    <!-- <img src="/svg/logo-plain.svg" alt="Mrkd Logo" width="120"> -->
                    marked
                </router-link>
            </div>
            <div class="w-3/4 flex justify-end">
                <!-- <div class="relative"> -->
                    <input class="w-full h-auto appearance-none focus:outline-none font-sans font-semibold text-2xl text-grey-darker ml-4" 
                        type="text" 
                        placeholder="search..."
                        ref="searchInput"
                        v-model="searchTerm"
                        v-show="searchActive" 
                        @blur="searchActive = false"
                        @keydown.esc="searchActive = false">
                    <!-- <div class="absolute" style="top: 50%; margin-top: -10px; left: 12px">
                        <svg class="icon text-grey-light">
                            <use href="/svg/icons.svg#icon-zoom" xlink:href="/svg/icons.svg#icon-zoom"/>
                        </svg>
                    </div>
                </div> -->
                <button class="text-2xl pt-1 mr-4" v-show="!searchActive" @click="openSearch">
                    <svg class="icon icon-outline icon-stroke-3 hover:text-teal text-grey pt-px">
                        <use href="/svg/icons.svg#icon-zoom" xlink:href="/svg/icons.svg#icon-zoom"/>
                    </svg>
                </button>
                <button class="text-2xl pt-1 mr-4" v-show="!searchActive">
                    <svg class="icon icon-outline icon-stroke-3 hover:text-teal text-grey pb-px">
                        <use href="/svg/icons.svg#icon-e-add" xlink:href="/svg/icons.svg#icon-e-add"/>
                    </svg>
                </button>
                <user-menu :user="'user'"/>
            </div>
        </nav>
    </div>
</template>

<script>
    import UserMenu from './UserMenu.vue';

    export default {
        components: {
            UserMenu
        },

        data() {
            return {
                searchActive: false,
                searchTerm: '',

            }
        },

        mounted() {

        },

        methods: {
            openSearch() {
                this.searchActive = true;

                this.$nextTick(() => this.$refs.searchInput.focus());
            }
        }
    }
</script>
