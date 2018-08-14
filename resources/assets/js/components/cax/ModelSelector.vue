<template>
    <div v-if="myModels.length > 0">
        <ul class="nav nav-pills">
            <!--<ul class="list-inline">-->
            <li role="presentation" v-for="model in myModels" v-if="model.brand_id === brand.id">
                <a href="#" @click.prevent="addIdToSelection(model.id)">{{ model.name }}</a>
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
            selection: {required:true},
            brand: {required:true},
            models: {required:false}
        },
        /**
         * The component's data.
         */
        data() {
            return {
                caxProbe: null,
                selectedIds: this.selection,
                myModels: []
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

         },

        methods: {
            /**
             * Prepare the component.
             */
            // Only load the brands models if no
            // model list was provided via props
            fetchModelList() {
                var fetchModels = false;
                if (!this.models) {
                    console.log('models undefined')
                    fetchModels = true;
                } else {
                    if (this.models.length > 0) {
                        this.myModels = this.models;
                    } else {
                        console.log('models < 1')
                        fetchModels = true;
                    }
                }
                if (fetchModels) {
                    console.log('fetch from DB')
                    this.getModelsForBrand(this.brand.id);
                }
            },

            getModelsForBrand($id) {
                axios.get('/api/modelsByBrand/' + $id)
                    .then(response => {
                        this.myModels = response.data;
                    })
                    .catch(error => {
                        console.log(error);
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
                    sender: 'model-selector'
                });
                console.log('Broadcast from ModelSelector: "' + myEvent + '", added model id: ' + id);
            },

            prepareComponent() {
                console.log('set value of myModels');

                this.fetchModelList();
                //console.log(this.myModels);
                //console.log('length of myModels = ' + this.myModels.length);
            }

        }

    }
</script>