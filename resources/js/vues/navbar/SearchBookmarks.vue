<template>
    <div class="w-full h-auto">
        <input class="w-full h-auto appearance-none focus:outline-none font-sans font-semibold text-2xl text-grey-darker ml-4 mr-4"
            type="text" 
            placeholder="search..."
            ref="searchInput"
            v-model="searchTerm"
            v-show="searchActive" 
            @blur="closeSearch"
            @keydown.esc="closeSearch">
        <button class="text-2xl pt-1 mr-4" v-if="searchActive" @click="closeSearch">
            <svg class="icon icon-outline icon-stroke-3 hover:text-teal text-grey pt-px">
                <use href="/svg/icons.svg#icon-e-remove" xlink:href="/svg/icons.svg#icon-e-remove"/>
            </svg>
        </button>
        <button class="text-2xl pt-1 mr-4" v-else @click="openSearch">
            <svg class="icon icon-outline icon-stroke-3 hover:text-teal text-grey pt-px">
                <use href="/svg/icons.svg#icon-zoom" xlink:href="/svg/icons.svg#icon-zoom"/>
            </svg>
        </button>
    </div>
</template>

<script>
    export default {
        props: [
            'searchActive'
        ],

        data() {
            return {
                searchTerm: '',
                loading: false
            }
        },

        mounted() {

        },

        methods: {
            openSearch() {
                events.$emit('search:bookmarks', true);

                this.$nextTick(() => this.$refs.searchInput.focus());
            },

            closeSearch() {
                events.$emit('search:bookmarks', false);
            }
        }
    }
</script>
