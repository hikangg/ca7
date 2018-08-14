<template>
    <div class="dropdown" style="display: inline;">
        <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Models
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="margin-top: 35px;">
            <li><a href="#">Select all</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Model 1</a></li>
            <li><a href="#">Model 2</a></li>
            <li><a href="#">Model 3</a></li>
        </ul>
    </div>
</template>

<script>
    /**
     * Register the sub components
     */
//    import ComponentObjectName from './ComponentFileName.vue'

    export default {
        /**
         * The component's proporties.
         */
        props: {},

        /**
         * Imported components
         */
        components: {
//            'cax-component-name': ComponentObjectName
        },

        /**
         * The component's data.
         */
        data() {
            return {};
        },

        computed: {
//            alreadySelected: function () { return window.selection; }
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
