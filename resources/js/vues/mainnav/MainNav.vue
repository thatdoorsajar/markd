<template>
    <div class="mb-6">
        <div class="flex justify-between border-l-4 border-transparent rounded-sm leading-none mb-2"
            :class="{
                'bg-grey-light border-teal': $route.name == 'home',
                'hover:bg-grey-light': !getIsDragging
            }">
            <router-link to="/" 
                class="w-full h-auto text-grey-darker font-semibold no-underline icon-text-aligner p-2 pr-3">
                <svg class="icon text-grey mr-2">
                    <use href="/svg/icons.svg#icon-house" xlink:href="/svg/icons.svg#icon-house"/>
                </svg>
                <p class="pt-1">Home</p>
            </router-link>
        </div>
        <div class="flex justify-between border-l-4 border-transparent rounded-sm leading-none mb-2"
            :class="{
                'bg-grey-light border-teal': $route.name == 'archived',
                'hover:bg-grey-light': !getIsDragging
            }">
            <router-link :to="`/archived`" 
                class="w-full h-auto text-grey-darker font-semibold no-underline icon-text-aligner p-2 pr-3">
                <svg class="icon text-grey mr-2">
                    <use href="/svg/icons.svg#icon-box" xlink:href="/svg/icons.svg#icon-box"/>
                </svg>
                <p class="pt-1">Archived</p>
            </router-link>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        data() {
            return {
                loading: false
            }
        },

        computed: mapGetters([
            'getActiveFolder',
            'getIsDragging'
        ])
    }
</script>
