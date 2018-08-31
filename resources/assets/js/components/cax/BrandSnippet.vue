<template>
    <div>
        <div class="row" v-if="brands.length > 0">
            <div class="col-md-12 col-sm-12" v-for="brand in brands">
                <div class="service-wrapper" style="padding: 3px;">
                    <!--<div class="well" style="padding: 5px;">-->
                    <nav class="navbar navbar-default">
                        <div class="container-fluid" style="padding: 5px;">

                            <div class="navbar-header">
                                <div class="col-xs-6 col-md-6">
                                    <a href="#" class="thumbnail" style="margin-bottom: 0">
                                        <img class=""  src="img/default-brand-logo.png" :alt="brand.name">
                                    </a>
                                </div>
                                <div class="navbar-brand">
                                    {{ brand.name }}
                                </div>
                            </div>
                            <div class="btn-toolbar navbar-btn pull-right" role="toolbar" aria-label="">
                                <div class="btn-group" role="group" aria-label="">

                                    <cax-toolbar-dropdown></cax-toolbar-dropdown>

                                    <cax-selection-toolbar tb-target-type="brand" :tb-target-id="brand.id"></cax-selection-toolbar>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    /**
     * Register the sub components
     */
    import CaxSelectionToolbar from "./SelectionToolbar";
    import CaxToolbarDropdown from "./ToolbarDropdown";

    export default {
        /**
         * The component's properties.
         */
        props: {
            brands: {required: true},
            models: {required: true}
        },

        /**
         * Imported components
         */
        components: {
            'cax-selection-toolbar': CaxSelectionToolbar,
            'cax-toolbar-dropdown': CaxToolbarDropdown

        },

        /**
         * The component's data.
         */
        data() {
            return {
                selectedIds: [],
                hrefPrefix: '/brands/'
            };
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
            console.log('Component mounted. v1.1');
        },

        computed: {
            urlPrefix() {
                return this.hrefPrefix;
            }
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {

            },

            /**
             * Get all the data.
             */

            getBrands() {
                axios.get('/api/brands')
                    .then(response => {
                        this.brands = response.data;
                    })
                   .catch(error => {
                       console.log(error);
                    });
            },

            getModels() {
                axios.get('/api/models')
                    .then(response => {
                        this.models = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

            handleSelectionChange(collectedIds) {
                var myMessage = 'Selection changed!';
                console.log(myMessage);
                alert(myMessage + collectedIds);
            }
        }
     }
</script>
