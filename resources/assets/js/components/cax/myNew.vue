<template>

</template>

<script>
    export default {
        /**
         * The component's proporties.
         */
        props: {},

        /**
         * The component's data.
         */
        data() {
            return {};
        },

        computed: {
            alreadySelected: function () {
                return window.selection;
            }
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {

            },
        }
    }
</script>
