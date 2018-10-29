<template>
    <div class="relative">
        <button class="font-semibold font-sans text-lg no-underline focus:outline-none text-white bg-teal-light hover:bg-teal rounded-full p-2"
            type="button"
            @click.prevent="show = !show">
            {{ user }}
        </button>
        <div v-show="show" class="absolute pin-r border-1 shadow-lg rounded bg-white mt-2">
            <ul class="list-reset font-sans font-semibold text-grey-darker">
                <a href="#" class="no-underline">
                    <li class="text-grey-darker hover:bg-teal-light hover:text-white rounded-t px-4 py-3">
                        extensions
                    </li>
                </a>
                <a href="#" class="no-underline">
                    <li class="text-grey-darker hover:bg-teal-light hover:text-white px-4 py-3">
                        settings
                    </li>
                </a>
                <a href="/logout" class="no-underline">
                    <li class="text-grey-darker hover:bg-teal-light hover:text-white rounded-b px-4 py-3">
                        logout
                    </li>
                </a>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: String
        },

        data() {
            return {
                show: false
            }
        }
    }
</script>
