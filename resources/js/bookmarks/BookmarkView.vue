<template>
    <div>
        <h3 class="font-century mb-4">
            <a :href="`#/f/${$route.params.slug}`" class="no-underline text-grey hover:text-teal-light icon-text-aligner">
                <svg class="icon">
                    <use href="/svg/icons.svg#icon-stre-left" xlink:href="/svg/icons.svg#icon-stre-left"/>
                </svg>
                BACK
            </a>
        </h3>
        <div v-if="!loading">
            
        </div>
        <div v-else>
            <svg class="icon icon-xl icon-outline icon-stroke-3 text-grey spin-slow">
                <use href="/svg/icons.svg#icon-refresh-69" xlink:href="/svg/icons.svg#icon-refresh-69"/>
            </svg>
            <br>
            // all the info about the bookmark!!!
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            folder: {
                type: Object
            }
        },

        data() {
            return {
                loading: true
            }
        },

        watch: {
            '$route' (to, from) {
                this.fetchFolder(to);
            }
        },

        mounted() {
            this.fetchFolder(this.$route);
        },

        methods: {
            fetchFolder(route) {
                this.loading = true;

                // 
            }
        }
    }
</script>
