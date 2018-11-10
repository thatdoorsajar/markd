<template>
    <portal to="modals" v-if="show">
        <div class="fixed pin flex items-center overflow-auto bg-smoke z-50" v-show="show">
            <div class="sm:w-1/2 lg:w-2/5 xl:w-1/4 leading-normal bg-white rounded-sm shadow-lg mx-auto p-6">
                <h1 class="font-century text-2xl mb-4" 
                    :class="danger ? 'text-red' : 'text-grey-darkest'">
                    <slot name="title">Modal Title</slot>
                </h1>
                <slot>
                    <p class="font-sans text-lg text-grey-darkest mb-6">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet non cupiditate unde vel animi, quae rerum minus obcaecati quis, possimus autem consequuntur velit laudantium corporis vero at aut omnis. Ipsum.
                    </p>
                </slot>
            </div>
        </div>
    </portal>
</template>

<script>
    export default {
        props: {
            show: {
                required: true,
                type: Boolean,
                default: false
            },

            danger: {
                type: Boolean,
                default: false
            }
        },

        created() {
            this.registerEscEvent();
        },

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
