<template>
    <portal to="folderTitleModal">
        <div class="fixed pin overflow-auto bg-smoke-light flex items-center" v-show="show">
            <div class="sm:w-1/2 lg:w-2/5 xl:w-1/4 leading-normal bg-white rounded-sm shadow mx-auto p-6">
                <h1 class="font-century text-2xl text-grey-darkest mb-2">
                    Folder Title
                </h1>
                <div class="relative mb-4">
                    <input class="w-full h-auto font-century font-semibold text-base text-grey-darker bg-grey-light appearance-none border-2 border-grey-light rounded-sm focus:outline-none focus:bg-grey-lighter focus:border-teal pl-8 pr-3 py-2"
                        type="text" 
                        v-model="newFolderTitle"
                        ref="titleInput"
                        @keydown.enter="submitNewTitle"
                        :class="{'opacity-50 cursor-not-allowed': loading}">
                    <div class="absolute" style="top: 50%; margin-top: -9px; left: 12px">
                        <svg class="icon text-grey-darker">
                            <use href="/svg/icons.svg#icon-folder-15-2" xlink:href="/svg/icons.svg#icon-folder-15-2"/>
                        </svg>
                    </div>
                    <div class="absolute" v-show="loading" style="top: 50%; margin-top: -9px; right: 12px">
                        <svg class="icon text-grey-light spin-normal">
                            <use href="/svg/icons.svg#icon-circle" xlink:href="/svg/icons.svg#icon-circle"/>
                        </svg>
                    </div>
                </div>
                <div class="flex justify-between">
                    <button class="font-century text-lg text-grey-dark hover:text-grey-darkest trans:bg focus:shadow-outline focus:outline-none py-2 px-4 mr-2"
                        type="button"
                        @click="dismiss">
                        Cancel
                    </button>
                    <button class="font-century text-lg text-white rounded-sm bg-grey-darker hover:bg-grey-darkest trans:bg focus:shadow-outline focus:outline-none py-2 px-4"
                        type="button"
                        @click="submitNewTitle">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </portal>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        props: ["show"],

        data() {
            return {
                newFolderTitle: '',
                loading: false
            }
        },

        created() {
            this.registerEscEvent();
        },

        computed: mapGetters([
            'getActiveFolder'
        ]),

        watch: {
            show(show) {
                if (show) {
                    this.$nextTick(() => {
                        setTimeout(() => {this.$refs.titleInput.focus()}, 200);
                    });
                }
            },

            getActiveFolder: {
                immediate: true,

                handler({ title }) {
                    this.newFolderTitle = title;
                }
            }
        },

        methods: {
            submitNewTitle() {
                console.log('submit');
            },

            registerEscEvent() {
                const escapeHandler = e => {
                    if (e.key === "Escape" && this.show) {
                        this.dismiss();
                    }
                }

                document.addEventListener("keydown", escapeHandler);

                this.$once("hook:destroyed", () => {
                    document.removeEventListener("keydown", escapeHandler);
                });
            },

            dismiss() {
                this.$emit("close");
            }
        }
    }
</script>
