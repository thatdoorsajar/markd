<template>
    <portal to="folderDeleteModal">
        <div class="fixed pin overflow-auto bg-smoke-light flex items-center" v-show="show">
            <div class="max-w-sm leading-normal bg-white rounded-sm shadow mx-auto p-6">
                <h1 class="font-century text-2xl text-red mb-4">
                    Delete {{ getActiveFolder.title }}?
                </h1>
                <p class="font-sans text-lg text-grey-darkest mb-6">
                    This will delete the folder and all its sub folders and bookmarks. Are you sure?
                </p>
                <div class="flex justify-between">
                    <button class="font-century text-lg text-grey-dark hover:text-grey-darkest trans:bg focus:shadow-outline focus:outline-none py-2 px-4 mr-2"
                        type="button"
                        @click="dismiss">
                        Cancel
                    </button>
                    <button class="font-century text-lg text-white rounded-sm bg-red-dark hover:bg-red-darkest trans:bg focus:shadow-outline focus:outline-none py-2 px-4"
                        type="button"
                        @click="dismiss">
                        Delete it!
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

        created() {
            this.registerEscEvent();
        },

        computed: mapGetters([
            'getActiveFolder'
        ]),

        methods: {
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
