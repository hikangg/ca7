<template>
    <div class="container">
        <div class="row" v-if="brands.length > 0">
            <div class="col-md-3 col-sm-6" v-for="brand in brands">
                <div class="service-wrapper" style="padding: 3px;">
                    <div class="well" style="padding: 5px;">

                        <a href="#" class="thumbnail">
                            <img class="img-responsive"  style="width:100%" src="img/default-brand-logo.png" :alt="brand.name">
                        </a>

                        <h3>{{ brand.name }}</h3>

                        <nav class="navbar navbar-default">
                            <div class="container-fluid" style="padding: 5px;">
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
    </div>
</template>

<script>
    /**
     * Register the sub components
     */
    import CaxSelectionToolbar from './SelectionToolbar.vue';
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
                sharedData: this.$root.$data,
//                choices: [],
                hrefPrefix: '/brands/'
//                selectionState: this.brandSelectionState

            }
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
//            console.log('Component mounted. v1.1');
            this.choices = this.currentSelection;

        },

        computed: {
            urlPrefix() {
                return this.hrefPrefix;
            },

            currentSelection: function() {
                return this.sharedData.selection;
            },

/*
            brandSelectionState: function () {
                return 1;
            }
*/

        },

        watch: {
/*
            brandSelectionState: function() {
                this.selectionState=this.brandSelectionState;
            },
*/

            currentSelection: function() {
                this.choices = this.currentSelection;
            }
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                /*
                 this.getBrands();
                 if (this.showmodels) {
                 this.getModels();
                 */
            },

            sayHello(txt) {
                return 'Hello ' + txt;
            },
//TODO: possibly remove isSelected()
            isSelected(val) {
                var num = 0;
                if (val === 2) {
                    num = 1
                } else {
                    if (val === 4) {
                        num = -1
                    }
                }
                return num;
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
