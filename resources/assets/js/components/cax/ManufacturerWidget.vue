<template>
        <div>
            <a :href="hrefPrefix+manufacturer.id"><slot></slot></a><br>
            <ul class="nav nav-pills">
                <!--<ul class="list-inline">-->
                <li role="presentation" v-for="brand in brands"  v-if="brand.manufacturer_id===manufacturer.id">
                    <a :href="hrefPrefixBrands+brand.id">{{brand.name }}</a>
                </li>
            </ul>
        </div>
</template>

<script>
    export default {
        /**
         * The component's proporties.
         */
        props: {
//            brands: {required:true},
            manufacturer: {required:true },
            linkurl: {required:true}
        },
        /**
         * The component's data.
         */
        data() {
            return {
                hrefPrefix: '/manufacturers/',
                hrefPrefixBrands: '/brands/'
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
                this.getBrands();
            }

          }

    }
</script>