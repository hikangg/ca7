<template>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-brand">
                Brands
            </div>
            <p class="navbar-text"><cax-selection-widget></cax-selection-widget></p>

            <div class="btn-toolbar navbar-btn" role="toolbar" aria-label="">

                  <div class="btn-group" role="group" aria-label="">
                    <div class="dropdown" style="display: inline;">
                        <button class="btn -sm btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Countries
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="margin-top: 35px;">
                            <li><a href="#">Select all</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Germany</a></li>
                            <li><a href="#">France</a></li>
                            <li><a href="#">Indonesia</a></li>
                        </ul>
                        <button type="button" class="btn btn-default" aria-label="Save basket" @click="requestBasketSave('Another new basket')">
                            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
                        </button>

                    </div>
                </div>

                <div class="btn-group pull-right" role="group" aria-label="">
                    <button type="button" :disabled="VIEW_MODE_LIST===viewmode" class="btn btn-default" aria-label="Right Align" @click="setViewMode(VIEW_MODE_LIST)">
                        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                    </button>
                    <button type="button" :disabled="VIEW_MODE_SNIPPET===viewmode" class="btn btn-default" aria-label="Right Align" @click="setViewMode(VIEW_MODE_SNIPPET)">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </button>
                    <button type="button" :disabled="VIEW_MODE_MATRIX===viewmode" class="btn btn-default" aria-label="Right Align" @click="setViewMode(VIEW_MODE_MATRIX)">
                        <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        /**
         * The component's proporties.
         */
        props: {},

        /**
         * The component's data.
         */
        data() {
            return {
                VIEW_MODE_SNIPPET: 0,
                VIEW_MODE_MATRIX: 0,
                VIEW_MODE_LIST: 0,
                sharedData: this.$root.$data,
                viewmode: 0,
                log: [],
                errors: []

            };
        },

        computed: {
            /**
             *
             */
            BRANDS_VIEW_DISPLAY_MODE_LIST: function() {
                return this.sharedData.BRANDS_VIEW_DISPLAY_MODES.BRANDS_VIEW_LIST;
            },
            BRANDS_VIEW_DISPLAY_MODE_SNIPPET: function() {
                return this.sharedData.BRANDS_VIEW_DISPLAY_MODES.BRANDS_VIEW_SNIPPET;
            },
            BRANDS_VIEW_DISPLAY_MODE_MATRIX: function() {
                return this.sharedData.BRANDS_VIEW_DISPLAY_MODES.BRANDS_VIEW_MATRIX;
            },

            alreadySelected: function () {
                return window.selection;
            },

            selectedViewMode: function()  {
                return this.sharedData.brandsviewmode;
            }

        },

        watch: {
            selectedViewMode: function() {
                this.viewmode = this.selectedViewMode
            }
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
            this.updateViewMode(this.selectedViewMode);
//            this.viewmode = this.selectedViewMode
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                this.setSystemConstants();

            },

            setSystemConstants() {
                this.VIEW_MODE_LIST = this.BRANDS_VIEW_DISPLAY_MODE_LIST;
                this.VIEW_MODE_SNIPPET = this.BRANDS_VIEW_DISPLAY_MODE_SNIPPET;
                this.VIEW_MODE_MATRIX = this.BRANDS_VIEW_DISPLAY_MODE_MATRIX;
            },

            updateViewMode(mode) {
                this.viewmode = mode;
            },

            /**
             * Broadcast view mode change
             */
            broadcastViewModeHasChanged(mode) {
                var myEvent = 'view-mode-was-changed';
                caxEvent.$emit(myEvent, {
                    brandsviewmode: mode,
                    sender: 'brands-view-mode-selector'
                });
                console.log('Broadcast from BrandsViewModeSelector: "' + myEvent + '", changed view mode to: ' + mode);
            },

            /**
             * Broadcast view mode change
             */
            broadcastBasketNeedsSaving(newName) {
                var myEvent = 'basket-needs-saving';
                caxEvent.$emit(myEvent, {
                    basketName: newName,
                    sender: 'brands-nav-bar'
                });
                console.log('Broadcast from BrandsNavBar: "' + myEvent + '", save as new basket: ' + newName);
            },

            /**
             * Set the active view mode
             */
            setViewMode(mode) {
                var currentViewMode = this.viewMode;
                console.log('current viewMode is ' + currentViewMode +' change to ' + mode);
                if (currentViewMode != mode) {
                    this.viewMode = mode;
                    var myEvent = 'brands-view-mode-was-changed';
                    caxEvent.$emit(myEvent, {
                        brandsviewmode: mode,
                        sender: 'brands-view-mode-selector'
                    });
                    console.log('Broadcast from BrandsViewModeSelector: "' + myEvent + '", changed view mode to: ' + mode);

                    console.log('new viewMode is ' + this.viewMode);

                }
            },

            saveBasket(val) {
                axios.post('/api/baskets', {name: val})
                    .then(response => {
                        this.log = 'posted' + val;
//                        console.log('posted "' + val + '"');
                        console.log(response.status);
                    })
                    .catch(error => {
                        this.errors = error;
                        console.log(error);
                    });
            },

            /**
             * Test function
             * @param id
             * @param obj
             */
            requestBasketSave(val) {
                if (val) {
                    console.log('Save with new name ' + val);
                } else {
                    console.log('Saving basket');
                }
                this.saveBasket(val);
                this.broadcastBasketNeedsSaving(val);
            }
        }
    }

</script>