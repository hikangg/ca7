<template>
    <div class="container">
        <div class="row">
<!--
            <div class="col-md-4">
                <div v-if="brands.length > 0">
                    <ul>
                        <li v-for="brand in brands">
                            &lt;!&ndash;{{ brand.name }}&ndash;&gt;
                            {{ brand.name }} ... {{ brand.id }} ... {{ brand.manufacturer_id }}
                        </li>
                    </ul>
                </div>
            </div>
-->
            <div class="col-md-8">
            <!--<div class="col-md-8 col-md-offset-2">-->
                <div class="panel panel-default">
                    <div class="panel-heading">Manufacturers</div>

                    <div class="panel-body">
                        <ul class="list-group" v-if="manufacturers.length > 0">
                            <li class="list-group-item" v-for="manufacturer in manufacturers">
                                <cax-manufacturer-widget :manufacturer="manufacturer" :brands="brands" :linkurl="urlPrefix+manufacturer.id">
                                    <h3>{{ manufacturer.name }}</h3>
                                </cax-manufacturer-widget>
                            </li>
                        </ul>

                        <table class="table table-borderless m-b-none" v-if="manufacturers.length > 0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                             </tr>
                            </thead>

                            <tbody>
                            <tr v-for="manufacturer in manufacturers">
                                <!-- Client Name -->
                                <td style="vertical-align: middle;">
                                    {{ manufacturer.id }}
                                </td>
                                <td style="vertical-align: middle;">
                                     <cax-manufacturer-widget :manufacturer="manufacturer" :brands="brands" :linkurl="urlPrefix+manufacturer.id">
                                        {{ manufacturer.name }}
                                    </cax-manufacturer-widget>
                                </td>
                             </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /**
         * The component's data.
         */
        data() {
            return {
                shared: sharedData,
                hrefPrefix: '/manufacturers/',
                manufacturers: [],
                brands: []
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
                this.getManufacturers();
                this.getBrands();
            },

            /**
             * Get all the data.
             */
            getManufacturers() {
                axios.get('/api/manufacturers')
                    .then(response => {
                        this.manufacturers = response.data;
                    })
                   .catch(error => {
                       console.log(error);
                    });
            },

            getBrands() {
                axios.get('/api/brands')
                    .then(response => {
                        this.brands = response.data;
                    })
                   .catch(error => {
                       console.log(error);
                    });
            }

        }
     }
</script>
