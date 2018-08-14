<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1><slot></slot></h1></div>

                    <div class="panel-body">
                        <h3>Vehicles for model_id {{ model_id }}</h3>
                        <div v-if="vehicles.length > 0">
                            <ul>
                                <li v-for="vehicle in vehicles"  v-if="vehicle.model_id===model_id">
                                    <a :href="urlPrefix+vehicle.id">{{ vehicle.name }}</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
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
            model_id: {required:true }
        },

        /**
         * The component's data.
         */
        data() {
            return {
                hrefPrefix: '/vehicles/',
                vehicles: [],
                match_id: 2
            };
        },

        computed: {
            urlPrefix() {
                return this.hrefPrefix;
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
                this.getVehicles(this.model_id);
            },

            getVehicles(id) {
                axios.get('/api/vehiclesByModel/'+id)
                    .then(response => {
                        this.vehicles = response.data;
                    })
            }


        }
    }
</script>
