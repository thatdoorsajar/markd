<template>
    <div class="flex-grow flex justify-end">
        <input class="w-full h-auto appearance-none focus:outline-none font-sans font-semibold text-2xl text-grey-darker mx-4"
            type="text" 
            placeholder="search..."
            ref="searchInput"
            v-model="searchTerm"
            v-show="searchActive" 
            @keydown.esc="searchActive = false">
        <button class="text-2xl pt-1 px-2 mr-1 focus:outline-none" v-if="searchActive" @click="searchActive = false">
            <svg class="icon icon-outline icon-stroke-3 hover:text-teal text-grey-dark">
                <use href="/svg/icons.svg#icon-e-remove" xlink:href="/svg/icons.svg#icon-e-remove"/>
            </svg>
        </button>
        <button class="text-2xl pt-1 px-2 mr-1 focus:outline-none" v-else @click="openSearch">
            <svg class="icon icon-outline icon-stroke-3 hover:text-teal text-grey-dark">
                <use href="/svg/icons.svg#icon-zoom" xlink:href="/svg/icons.svg#icon-zoom"/>
            </svg>
        </button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                searchActive: false,
                searchTerm: '',
                loading: false
            }
        },

        methods: {
            openSearch() {
                this.searchActive = true;

                this.$nextTick(() => this.$refs.searchInput.focus());
            }
        }
    }
</script>
