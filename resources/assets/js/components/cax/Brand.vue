<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Brand</div>
                    <div class="panel-body">
                    <cax-brand-widget :brand="brand" :selection="selectedIds" :showModels="true" :models2="models" :linkurl="/brands/" >
                        <h3>{{ brand.name }}</h3>
                    </cax-brand-widget>
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
            brand: {required:true },
            brand_id: {required:true }
        },

        /**
         * The component's data.
         */
        data() {
            return {
                selectedIds: [],
                hrefPrefix: '/models/',
                models: []
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
//                this.getModels();
            },

            getModels() {
                axios.get('/api/models')
                    .then(response => {
                        this.models = response.data;
                    })
            }


        }
     }
</script>
