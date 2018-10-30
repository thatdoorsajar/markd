<template>
    <div class="fixed pin overflow-auto bg-smoke-light flex items-center" v-show="show">
        <div class="max-w-sm bg-white rounded-sm shadow mx-auto p-6">
            <h1 class="font-century text-2xl font-semibold mb-4">
                This modal
            </h1>
            <p class="font-sans text-lg text-grey-darkest mb-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla laboriosam, cum voluptatem placeat, id at labore quaerat dolorem atque, soluta officiis expedita itaque libero illo. Aliquam alias odio reiciendis ipsum!
            </p>
            <div class="text-right">
                <button class="font-century text-lg text-white rounded-sm bg-grey-darker hover:bg-grey-darkest trans:bg focus:shadow-outline focus:outline-none py-2 px-4"
                    type="button"
                     @click="dismiss">
                    Dismiss
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["show"],

        created() {
            const escapeHandler = e => {
                if (e.key === "Escape" && this.show) {
                    this.dismiss();
                }
            }

            document.addEventListener("keydown", escapeHandler);

            this.$once("hook:destroyed", () => {
                document.removeEventListener("keydown", escapeHandler);
            })
        },

        methods: {
            dismiss() {
                this.$emit("close");
            }
        }
    }
</script>
