<template>
    <div>
        <!-- <div class="w-full h-1 bg-teal"></div> -->
        <nav class="flex items-center justify-between bg-white border-b-2 border-grey-lighter py-4 px-8">
            <div class="flex items-center flex-no-shrink mr-6">
                <router-link to="/" class="no-underline grey-80 hover:grey-0">
                    <img src="/svg/logo-head.svg" alt="Markd Logo" width="100">
                </router-link>
            </div>
            <div class="block">
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
                navbar: true
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
