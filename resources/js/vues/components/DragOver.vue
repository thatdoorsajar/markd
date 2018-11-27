<template>
    <div @drop.stop.prevent="dropHandle" 
        class="h-24 w-24 bg-grey"
        style="background: url(https://clearbit.com/assets/site/v2/preview.png)">
    </div>
</template>

<script>
    export default {
        mounted() {
            window.addEventListener("dragover", function (e) {
                e = e || event;
                e.preventDefault();
            }, false);

            window.addEventListener("drop", function (e) {
                e = e || event;
                e.preventDefault();
            }, false);
        },

        methods: {
            dropHandle(e) {
                console.log(e.dataTransfer.getData('Url'));
            }
        }
    }
</script>
