<template>
    <div class="mb-6">
        <div class="flex justify-between border-l-4 border-transparent rounded-sm leading-normal hover:bg-grey-light mb-2">
            <router-link :to="`/`" 
                class="w-full h-auto text-grey-darker font-semibold no-underline icon-text-aligner p-2 pr-3">
                <svg class="icon text-grey mr-2">
                    <use href="/svg/icons.svg#icon-house" xlink:href="/svg/icons.svg#icon-house"/>
                </svg>
                <p>Home</p>
            </router-link>
        </div>
        <div class="flex justify-between border-l-4 border-transparent rounded-sm leading-normal hover:bg-grey-light mb-2">
            <router-link :to="`/archived`" 
                class="w-full h-auto text-grey-darker font-semibold no-underline icon-text-aligner p-2 pr-3">
                <svg class="icon text-grey mr-2">
                    <use href="/svg/icons.svg#icon-box" xlink:href="/svg/icons.svg#icon-box"/>
                </svg>
                <p>Archived</p>
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: false
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
