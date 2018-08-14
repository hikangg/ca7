<template>
    <div>
        <a :href="linkurl"><slot></slot></a><br>
        <!--&nbsp;Models (for ID {{ brand.id }}): ??? v5.4-->
        <div v-if="vehicles.length > 0">
            <ul class="nav nav-pills">
                <!--<ul class="list-inline">-->
                <li role="presentation" v-for="vehicle in vehicles"  v-if="vehicle.model_id===model.id">
                    <a href="#" @click.prevent="addIdToSelection(vehicle.id)">{{ vehicle.name }}</a>
                </li>
            </ul>
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
            model: {required:true},
            linkurl: {required:true}
        },
        /**
         * The component's data.
         */
        data() {
            return {
                caxProbe: null,
                hrefPrefix: '/models/',
                selectedIds: this.selection,
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

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                this.getVehicles(model.id);
            },

            getVehicles(id) {
                axios.get('/api/vehiclesByModel/{id}')
                    .then(response => {
                        this.vehicles = response.data;
                    });
            },

            addIdToSelection(id) {
                this.selectedIds.push(id);
                this.broadcastSelectionHasChanged(id);
            },

            broadcastSelectionHasChanged(id) {
                var myEvent = 'selection-was-changed';
                caxEvent.$emit(myEvent, {
                    selection: this.selectedIds,
                    sender: 'model-widget'
                });
                console.log('Broadcast from ModelWidget.vue: "' + myEvent + '", added vehicle id: ' + id);
            }




        }

    }
</script>