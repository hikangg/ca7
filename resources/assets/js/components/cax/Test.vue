<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Test Component</div>

                    <div class="panel-body">
                        <!-- Personal Access Tokens -->
                        <h2 v-if="models.length < 1">No matching vehicles found</h2>
                        <table class="table table-borderless m-b-none" v-if="models.length > 0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Price</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr v-for="model in models">
                                <!-- Client Name -->
                                <td style="vertical-align: middle;">
                                    {{ model.id }}
                                </td>
                                <td style="vertical-align: middle;">
                                    {{ model.make }}
                                </td>
                                <td style="vertical-align: middle;">
                                    {{ model.model }}
                                </td>
                                <td style="vertical-align: middle;">
                                    {{ model.price }}
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
                models: []
            };
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
            console.log('Component mounted. v1.1');
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                this.getModels();
            },

            /**
             * Get all of the personal access tokens for the user.
             */
            getModels() {
                axios.get('/api/modelnames')
                    .then(response => {
//                        this.models = response.data;
                        this.models = response.data;
                    })
//                   .catch(error => {
//                       console.log(error);
//                    });
            },
        }
     }
</script>
