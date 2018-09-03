<template>
    <div>
        <cax-brand-snippet v-if="viewmode === VIEW_MODE_SNIPPET" :brands="brands" :models="models"></cax-brand-snippet>
        <cax-brand-matrix v-if="viewmode === VIEW_MODE_MATRIX" :brands="brands" :models="models"></cax-brand-matrix>
        <cax-brand-list v-if="viewmode === VIEW_MODE_LIST" :brands="brands" :models="models"></cax-brand-list>
    </div>
</template>

<script>
    /**
     * Register the sub components
     */
    import caxBrandList from './BrandList.vue';
    import caxBrandSnippet from './BrandSnippet.vue';
    import caxBrandMatrix from './BrandMatrix.vue';

    export default {
        /**
         * The component's properties.
         */
        props: {
            showmodels: {required: true}
            },

        /**
         * Imported components
         */
        components: {
            'cax-brand-list': caxBrandList,
            'cax-brand-snippet': caxBrandSnippet,
            'cax-brand-matrix': caxBrandMatrix
        },

        /**
         * The component's data.
         */
        data() {
            return {
                VIEW_MODE_SNIPPET: 0, // Is updated from global constants in app.js
                VIEW_MODE_MATRIX: 0,
                VIEW_MODE_LIST: 0,
                sharedData: this.$root.$data,
                selectedIds: [],
                hrefPrefix: '/brands/',
                brands: {},
                models: {},
                viewmode: 0
            }
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
            this.updateViewMode(this.selectedViewMode)
        },

        computed: {
            BRANDS_VIEW_DISPLAY_MODE_LIST: function() {
                return this.sharedData.BRANDS_VIEW_DISPLAY_MODES.BRANDS_VIEW_LIST;
            },
            BRANDS_VIEW_DISPLAY_MODE_SNIPPET: function() {
                return this.sharedData.BRANDS_VIEW_DISPLAY_MODES.BRANDS_VIEW_SNIPPET;
            },
            BRANDS_VIEW_DISPLAY_MODE_MATRIX: function() {
                return this.sharedData.BRANDS_VIEW_DISPLAY_MODES.BRANDS_VIEW_MATRIX;
            },
            selectedViewMode: function()  {
                return this.sharedData.brandsviewmode;
           }
        },

        watch: {
            selectedViewMode: function() {
                this.viewmode = this.selectedViewMode
            }
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                this.setSystemConstants();
                this.getBrands();
                if (this.showmodels) {
                    this.getModels();
                }
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

            updateViewMode(mode) {
                this.viewmode = mode;
            },

            setSystemConstants() {
//                this.VIEW_MODE_LIST = this.BRANDS_VIEW_DISPLAY_MODE_LIST;
//                this.VIEW_MODE_SNIPPET = this.BRANDS_VIEW_DISPLAY_MODE_SNIPPET;
//                this.VIEW_MODE_MATRIX = this.BRANDS_VIEW_DISPLAY_MODE_MATRIX;
            },

            handleSelectionChange(collectedIds) {
                var myMessage = 'Selection changed!';
                console.log(myMessage);
                alert(myMessage + collectedIds);
            }


        }
     }
</script>
