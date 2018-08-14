<template>
    <div class="panel panel-default"  data-spy="affix" data-offset-top="205">
        <div class="panel-heading">Current Selection</div>

        <div class="panel-body" v-if="selection.length > 0">
            <ul class="nav nav-pills nav-stacked" v-for="id in selection">
                <li><a href="#">id {{ id }}</a></li>
            </ul>
        </div>

        <div class="panel-footer">
            <div>
                Selected ids: {{ selection }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /**
         * The component's proporties.
         */
        props: {
            selection: {required:true}
        },
        /**
         * The component's data.
         */
        data() {
            return {
                 selectedIds: []
            };
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
//            console.log('Component mounted. v1.1');
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