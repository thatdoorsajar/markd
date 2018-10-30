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
            <svg class="icon icon-xl icon-outline icon-stroke-3 text-grey spin-slow">
                <use href="/svg/icons.svg#icon-refresh-69" xlink:href="/svg/icons.svg#icon-refresh-69"/>
            </svg>
        </div>
        <div v-else class="font-semibold text-grey">
            <p class="mb-4"><span v-for="number in getNumbers">{{ number }} </span></p>
            <button type="button" class="bg-teal text-white rounded-sm px-3 py-2" @click="fetchNumber">
                add
            </button>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapMutations, mapActions } from 'vuex';

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
            '$route': {
                immediate: true,

                handler(to, from) {
                    this.fetchBookmark(to);
                }
            }
        },

        methods: {
            fetchBookmark(route) {
                this.loading = true;

                // get bookmark out of Vuex store?
            }
        }
    }
</script>
