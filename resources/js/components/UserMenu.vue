<template>
    <div class="relative z-10">
        <button class="font-semibold font-sans text-lg no-underline focus:outline-none text-white bg-teal-light hover:bg-teal rounded-full p-2"
            type="button"
            @click.prevent="show = !show">
            {{ getUser.initials }}
        </button>
        <div v-show="show" class="absolute pin-r border-2 shadow rounded bg-white mt-2">
            <ul class="w-32 list-reset font-sans font-semibold text-grey-darker">
                <li class="hover:bg-grey-light rounded-t-sm">
                    <a href="#" class="flex text-grey-darker no-underline px-4 py-3">
                        <svg class="icon text-grey-darker mr-2"><use href="/svg/icons.svg#icon-window-zoom-in-3" xlink:href="/svg/icons.svg#icon-window-zoom-in-3"/></svg>
                        <span>apps</span>
                    </a>
                </li>
                <li class="hover:bg-grey-light">
                    <a href="#" class="flex text-grey-darker no-underline px-4 py-3">
                        <svg class="icon text-grey-darker mr-2"><use href="/svg/icons.svg#icon-single-02-2" xlink:href="/svg/icons.svg#icon-single-02-2"/></svg>
                        <span>settings</span>
                    </a>
                </li>
                <li class="hover:bg-grey-light rounded-b-sm">
                    <a href="/logout" class="flex text-grey-darker no-underline px-4 py-3">
                        <svg class="icon text-grey-darker mr-2"><use href="/svg/icons.svg#icon-circle-simple-left" xlink:href="/svg/icons.svg#icon-circle-simple-left"/></svg>
                        <span>logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    
    export default {
        data() {
            return {
                show: false
            }
        },

        computed: mapGetters([
            'getUser'
        ]),
    }
</script>
