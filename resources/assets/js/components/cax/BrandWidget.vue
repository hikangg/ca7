<template>
    <div>
        <a :href="hrefPrefix+brand.id"><slot></slot></a>
        <!--&nbsp;Brands (for ID {{ manufacturer.id }}): ??? v5.4-->
        <div v-if="showModels">
            <cax-model-selector :brand="brand" :models="models2" :selection="selection"></cax-model-selector>
        </div>
    </div>
</template>

<script>
    export default {
        /**
         * The component's proporties.
         */
        props: {
            selection: {required:true},
            brand: {required:true},
            models2: {required: false},
            showModels: {required:true}
        },
        /**
         * The component's data.
         */
        data() {
            return {
                caxProbe: null,
                hrefPrefix: '/brands/',
                selectedIds: this.selection
            };
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
//            console.log('Component mounted. v1.1');
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {

            },

            addIdToSelection(id) {
                this.selectedIds.push(id);
                this.broadcastSelectionHasChanged(id);
            },

            broadcastSelectionHasChanged(id) {
                var myEvent = 'selection-was-changed';
                caxEvent.$emit(myEvent, {
                    selection: this.selectedIds,
                    sender: 'brand-widget'
                });
                console.log('Broadcast from BrandWidget: "' + myEvent + '", added model id: ' + id);
            }




        }

    }
</script>