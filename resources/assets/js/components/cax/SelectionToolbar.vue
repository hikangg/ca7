<template>
    <div style="display: inline">
            <cax-toolbar-button
                    @selection-was-changed="console.log('note taken')"
                    :btn-sel-type="tbTargetType" :btn-sel-id="tbTargetId" :btn-purpose="btn" :size-class="buttonSize"
                    v-for="btn in buttons"></cax-toolbar-button>
    </div>
</template>

<script>
    import CaxToolbarButton from "./ToolbarButton";

    export default {
        /**
         * The component's proporties.
         */
        props: {
            tbTargetType: {required:true},
            tbTargetId: {required:true},
            tbButtonSize: {required:false}
        },

        /**
         * Imported components
         */
        components: {
            'cax-toolbar-button': CaxToolbarButton
        },

        /**
         * The component's data.
         */
        data() {
            return {
                sharedData: this.$root.$data,
                selections: [],
                buttons : {}
            };
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
            this.selections = this.globalSelection;
            this.setButtonObject(this.buttonTypes);
//            window.caxEvent.$on('selection-was-changed', () => this.refreshCriteria());

        },

        computed: {
            globalSelection: function() {
                return this.sharedData.selection;
            },

            buttonTypes: function () {
                return [ 0, 2, 1 ];
            },

            buttonSize: function () {
                if (this.tbButtonSize === "") {
                    return 'btn-sm';
                } else {
                    return this.tbButtonSize;
                }
            }
        },

        watch: {

        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {

            },

            setButtonObject(obj) {
                this.buttons = obj;
            },

            refreshCriteria() {
                console.log('SelectionToolbar.refreshCriteria');
           }
        }
    }
</script>
