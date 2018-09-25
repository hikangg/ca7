<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><slot></slot></div>
                    <div class="panel-body">
                        <h3>{{ manufacturer.name }}</h3>
                        <div v-if="brands.length > 0">
                            <ul class="nav nav-pills">
                                <li  role="presentation" v-for="brand in brands"  v-if="brand.manufacturer_id===manufacturer.id">
                                    <a :href="urlPrefix+brand.id">{{ brand.name }}</a>
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
            manufacturer: {required:true },
        },

        /**
         * The component's data.
         */
        data() {
            return {
                hrefPrefix: '/brands/',
                brands: []
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
                this.getBrands();
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
