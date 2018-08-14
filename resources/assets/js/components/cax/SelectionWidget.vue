<template>
    <div>
             Selection: ->{{ alreadySelected }}<-
    </div>
</template>

<script>
    export default {
        /**
         * The component's proporties.
         */
        props: {
//            currentSelection: {}
        },
        /**
         * The component's data.
         */
        data() {
            return {
/*
                myVersion: 'CA10 -3',
                selectionTest: []
*/
            };
        },

        computed: {
                alreadySelected: function () { return window.selection; }
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
//            console.log('Component mounted. v1.1');
//            caxEvent.$on('selection-was-changed', () => this.handleSelectionChange(caxEvent));
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
//                this.getBrands();
            },

/*
            handleSelectionChange(collectedIds) {
                for (let value of collectedIds) {
                    value += 1;
                    console.log(value);
                }
                alert('Selection changed!' + collectedIds)
            }
*/



        }

    }
</script>
