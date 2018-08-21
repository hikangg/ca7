<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!--<div class="col-md-8 col-md-offset-2">-->
                <div class="panel panel-default">
                    <div class="panel-heading">Models</div>

                    <div class="panel-body">
                        <table class="table table-borderless m-b-none" v-if="models.length > 0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Brand</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr v-for="model in models">
                                <!-- Client Name -->
                                <td style="vertical-align: middle;">
                                    {{ model.id }}
                                </td>
                                <td style="vertical-align: middle;">
                                    <h2>{{ model.name }}</h2>
<!--
                                    <cax-model-widget
                                            v-on:selection-was-changed="handleSelectionChange"
                                            :model="model"
                                            :linkurl="urlPrefix+model.id" :selection="currentSelection"
                                    >
                                        <h2>{{ model.name }}</h2>
                                    </cax-model-widget>
-->
                                </td>
                                <td style="vertical-align: middle;">
                                    {{ model.brand_id }}
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
         * The component's properties.
         */
        props: {

        },

        /**
         * The component's data.
         */
        data() {
            return {
//                currentSelection: [],
                hrefPrefix: '/models/',
                models: [],
                vehicles: []
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
                this.getModels();
                this.getVehicles();
            },

            /**
             * Get all the data.
             */

            getModels() {
                axios.get('/api/models')
                    .then(response => {
                        this.models = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

            getVehicles() {
                axios.get('/api/vehicles')
                    .then(response => {
                        this.vehicles = response.data;
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
