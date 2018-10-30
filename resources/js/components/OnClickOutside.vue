<script>
    export default {
        props: ['then'],

        mounted() {
            this.registerClickOutEvent();
        },

        render() {
            return this.$slots.default[0];
        },

        methods: {
            registerClickOutEvent() {
                const listener = (e) => {
                    if (e.target === this.$el || this.$el.contains(e.target)) return;

                    this.then();
                }

                document.addEventListener('click', listener);
                
                this.$once('hook:beforeDestroy', () => {
                    document.removeEventListener('click', listener);
                });
            }
        }
    }
</script>
