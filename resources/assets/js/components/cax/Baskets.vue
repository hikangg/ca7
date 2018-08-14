<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">

                    <div class="panel-heading">Baskets</div>

                    <div class="panel-body">
                        <ul class="list-group" v-if="baskets.length > 0">
                            <li class="list-group-item" v-for="basket in baskets">
                                    <h3>{{ basket.name }}</h3>
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
         * The component's data.
         */
        data() {
            return {
//                shared: sharedData,
                hrefPrefix: '/baskets/',
                baskets: []
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
                this.getBaskets();
            },

            /**
             * Get all the data.
             */
            getBaskets() {
                axios.get('/api/baskets')
                    .then(response => {
                        this.baskets = response.data;
                    })
//                   .catch(error => {
//                       console.log(error);
//                    });
            }
        }
     }
</script>
