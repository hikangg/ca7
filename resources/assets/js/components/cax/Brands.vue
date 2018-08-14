<template>
    <div class="container">
        <div class="row">
           <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Brands</div>
                     <div class="panel-body">
                         <ul class="list-group" v-if="brands.length > 0">
                             <li class="list-group-item" v-for="brand in brands">
                                 <cax-brand-widget
                                         v-on:selection-was-changed="handleSelectionChange"
                                         :brand="brand" v-bind:models2="models" :showModels="showmodels"
                                         :selection="selectedIds"
                                 >
                                     <h3>{{ brand.name }}</h3>
                                 </cax-brand-widget>
                             </li>
                         </ul>
                     </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /**
         * The component's properties.
         */
        props: {
            showmodels: {required: true}
        },

        /**
         * The component's data.
         */
        data() {
            return {
                selectedIds: [],
                hrefPrefix: '/brands/',
                brands: [],
                models: {}
            };
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
//            console.log('Component mounted. v1.1');
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

            handleSelectionChange(collectedIds) {
                var myMessage = 'Selection changed!';
                console.log(myMessage);
                alert(myMessage + collectedIds);
            }


        }
     }
</script>
