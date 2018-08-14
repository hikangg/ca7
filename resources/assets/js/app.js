
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.caxEvent = new Vue;
/*
let sharedData = {
        caxVersion: 'CA9 -2',
        caxSelection: [444]
    };
*/

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

Vue.component(
    'cax-manufacturers',
    require('./components/cax/Manufacturers.vue')
);

Vue.component(
    'cax-manufacturer',
    require('./components/cax/Manufacturer.vue')
);

Vue.component(
    'cax-manufacturer-widget',
    require('./components/cax/ManufacturerWidget.vue')
);

Vue.component(
    'cax-brands',
    require('./components/cax/Brands.vue')
);

Vue.component(
    'cax-brand',
    require('./components/cax/Brand.vue')
);

Vue.component(
    'cax-brands-nav-bar',
    require('./components/cax/BrandsNavBar.vue')
);

Vue.component(
    'cax-brands-view-mode-selector',
    require('./components/cax/BrandsViewModeSelector.vue')
);

/*
Vue.component(
    'cax-brand-matrix',
    require('./components/cax/BrandMatrix.vue')
);

Vue.component(
    'cax-brand-snippet',
    require('./components/cax/BrandSnippet.vue')
);

Vue.component(
    'cax-brand-list',
    require('./components/cax/BrandList.vue')
);
*/

Vue.component(
    'cax-brand-widget',
    require('./components/cax/BrandWidget.vue')
);

Vue.component(
    'cax-selector-panel',
    require('./components/cax/SelectorPanel.vue')
);

Vue.component(
    'cax-model-selector',
    require('./components/cax/ModelSelector.vue')
);

Vue.component(
    'cax-models',
    require('./components/cax/Models.vue')
);

Vue.component(
    'cax-model',
    require('./components/cax/Model.vue')
);

Vue.component(
    'cax-model-widget',
    require('./components/cax/ModelWidget.vue')
);

Vue.component(
    'cax-selection-widget',
    require('./components/cax/SelectionWidget.vue')
);

Vue.component(
    'cax-test',
    require('./components/cax/Test.vue')
);

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

Vue.component(
    'cax-baskets',
    require('./components/cax/Baskets.vue')
);

/**
 * Create a fresh Vue application instance and attach it to
 * the page.
 * LEAVE THIS CODE AT THE END OF THIS FILE !!!
 */

var app = new Vue({
    el: '#app',

data: {
    /**
     * Define the system constants used in the application
     */
    BRANDS_VIEW_DISPLAY_MODES: {
        BRANDS_VIEW_LIST: 4,
        BRANDS_VIEW_SNIPPET: 1,
        BRANDS_VIEW_MATRIX: 2
    },

    /**
     * Define objects storing the default run options
     */
    DEFAULT_RUN_OPTIONS: {
        BRANDS_VIEW_DISPLAY_MODE: 0
    },

    /**
     * Define the global variables here
     */
    brandsviewmode: 0,
        selection: [
            {type: 'brand', value: 2, mode: 1, user: 'chrisje', active : 1, purge: 0},
            {type: 'brand', value: 13, mode: -1, user: 'chrisje', active : 1, purge: 0},
            {type: 'brand', value: 21, mode: 1, user: 'chrisje', active : 1, purge: 0},
            {type: 'model', value: 3, mode: -1, user: 'chrisje', active : 1, purge: 0}
        ],
        btnCriteria: {}
    },

    mounted() {
        /**
         * Initialize the system defaults
         */
        this.updateBrandsViewDefaults();
        /**
         * Initialize the system run options
         */
        this.initBrandsViewDisplayMode();
        /**
         * Event listeners
         */
        caxEvent.$on('selection-was-changed', (eventData) => this.handleSelectionChangeGL(eventData));
        caxEvent.$on('brands-view-mode-was-changed', (eventData) => this.handleBrandsViewModeChangeGL(eventData));
    },

    computed: {
        // Define the default values for the application
        DEFAULT_BRANDS_VIEW_DISPLAY_MODE: function()  {
            return this.BRANDS_VIEW_DISPLAY_MODES.BRANDS_VIEW_MATRIX;
        }
    },

/*
    watch: {
        DEFAULT_BRANDS_VIEW_DISPLAY_MODE: function() {
            this.DEFAULT_RUN_OPTIONS.BRANDS_VIEW_DISPLAY_MODE = this.DEFAULT_BRANDS_VIEW_DISPLAY_MODE
        }
    },
*/

    methods: {
        /**
         * Functions supporting the event listeners
         * @param eventData
         */
        handleSelectionChangeGL(eventData) {

            console.log('handleSelectionChangeGL-app received event and runs:  ' + JSON.stringify(this.selection));
        },

        handleBrandsViewModeChangeGL(eventData) {
            this.brandsviewmode = eventData.brandsviewmode;
            // console.log('app received event and runs: handleBrandsViewModeChangeGL ' + this.brandsviewmode);
        },

        /**
         * Functions handling setting the defaults in the appropriate objects
         */
        updateBrandsViewDefaults() {
            this.DEFAULT_RUN_OPTIONS.BRANDS_VIEW_DISPLAY_MODE = this.DEFAULT_BRANDS_VIEW_DISPLAY_MODE;
        },

        /**
         * Functions initialising the run options with the defined default values
         */
        initBrandsViewDisplayMode() {
            this.brandsviewmode = this.DEFAULT_RUN_OPTIONS.BRANDS_VIEW_DISPLAY_MODE;
        }


    }
});

