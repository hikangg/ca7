<template>
    <button type="button" class="btn" :class="classObject" :aria-label="buttonAriaLabel"
            @click="makeSelection(btnSelType, btnSelId, btnPurpose)">
        <span :class="buttonIcon" aria-hidden="true"></span>
    </button>
</template>

<script>
    /**
     * Register the sub components
     */
//    import ComponentObjectName from './ComponentFileName.vue'

    export default {
        /**
         * The component's proporties.
         */
        props: {
            btnSelType: {required:true},
            btnSelId: {required:true},
            btnPurpose: {required:true},
            sizeClass: {required: true}
        },

        /**
         * Imported components
         */
        components: {
//            'cax-component-name': ComponentObjectName
        },

        /**
         * The component's data.
         */
        data() {
            return {
                sharedData: this.$root.$data,
                test: {},
                userId: 'u888',
                selections: [],
                criteria: {},
                classObject: {},
                buttonIcon: 'glyphicon glyphicon-option-horizontal',
                buttonAriaLabel: ''
            }
        },

        computed: {
            globalSelection: function() {
                return this.sharedData.selection;
            },

            matchingCriteria: function () {
                let obj = this.selections;
                let type = this.btnSelType;
                let id = this.btnSelId;
                let choice = {};
                let i = 0;
                if (obj) {
                    for (i = 0; i < obj.length; i++) {
                        if (obj[i].type === type && obj[i].value === id) {
                            choice = obj[i];
                            choice.index = i;
//                            console.log('type=' + type + ' id=' + id);
//                            console.log('toolbar matchingCriteria ' + JSON.stringify(choice));
                            break;
                        }
                    }
                }
//                console.log('toolbar matchingCriteria at very end (i=' + i + ' brand.id=' + id + ') '  + JSON.stringify(choice));
                return choice;
            },

            siblingCriteria: function () {
                return this.getSiblingCriteria()
            },

            buttonIcons: function () {
                return [
                    { type: 0, icon: 'glyphicon glyphicon-remove'},     // selection cleared
                    { type: 1, icon: 'glyphicon glyphicon-ok'},         // include in selection
                    { type: 2, icon: 'glyphicon glyphicon-ban-circle'}   // exclude from selection
                ];
            },

            currentClass: function () {
//                console.log('btnState=' + this.btnState)
                let purpose = this.btnPurpose;
                let state = this.criteria.mode;
                let active = this.criteria.active;
                let size = 'btn-sm';

                if (this.sizeClass) {size = this.sizeClass}

                let obj = {
                    'btn-default': active === 0 || (!(purpose === 1 && state === 1) && !(purpose === 2 && state === -1)),
                    'btn-info': active === 1 && purpose === 1 && state === 1,
                    'btn-warning': active === 1 && purpose === 2 && state === -1,
                    'btn-xs': size === 'btn-xs',
                    'btn-sm': size === 'btn-sm',
                    'btn-lg': size === 'btn-lg',
                };
//                console.log('currentClass ' + JSON.stringify(obj));
                return obj;
            }
        },

        watch: {
/*
            selections: function (val) {

            }
*/
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
            this.reloadCriteria();
            this.refreshButton();
            window.caxEvent.$on('selection-was-changed', () => this.handleSelectionWasChanged());
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {

            },

            makeSelection(type, id, purpose) {
                if (this.updateSelection(type, id, purpose)) {
                    this.broadcastSelectionWasChanged();
//                    console.log('selection updated');
                }
            },

            updateSelection(type, id, purpose) {
                let mode = 0;
                let idx = null;

                if (purpose === 0) {
                    /** Clear selection */
                    if (Object.keys(this.criteria).length === 0) {
                        return false;
                    } else {
                        idx = this.criteria.index;
                        /** Set the selection record to inactive */
                        this.selections[idx].active = 0;
                        return true;
                    }
                }

                /** Set the search mode according to the button's purpose */
                if (purpose === 1) {
                    /** Include in selection */
                    mode = 1;
                } else {
                    /** Exclude from selection */
                    mode = -1;
                }

                if (Object.keys(this.criteria).length === 0) {
                    /** No selection record exist, so create a new one  */
                    this.criteria = {
                        type: type,
                        value: id,
                        mode: mode,
                        user: this.userId,
                        active : 1,
                        purge: 0,
                        index: null
                    };
                    if (this.selections.push(this.criteria)) {
//                        console.log('ToolbarBar.updateSelection-Setting btnCriteria');
                        this.$root.$data.btnCriteria = this.criteria;
                        idx = this.selections.length -1;
                        this.criteria.index = idx;
//                        this.reloadCriteria(this.criteria.index);
                    }
//                    console.log('ToolbarButton.updateSelection-New record ' + JSON.stringify(this.criteria));
                    return true;
                } else {
                    /** Update the existing selection */
                    if (this.criteria.mode !== mode || this.criteria.active === 0) {
                        idx = this.criteria.index;
                        this.selections[idx].mode = mode;
                        this.selections[idx].active = 1;
//                        console.log('updated this.selections[' + idx + '] = ' + JSON.stringify(this.criteria));
                        return true;
                    } else {
                        return false;
                    }
                }
            },

            getIcon(val) {
                let obj = this.buttonIcons;
                let i = 0;
                let icon = 'glyphicon glyphicon-option-horizontal';
                if (obj) {
                    for (i = 0; i < obj.length; i++) {
                        if (obj[i].type === val) {
                            icon = obj[i].icon;
                        }
                    }
                }
                return icon;
            },

            updateClass() {
                this.classObject = this.currentClass;
//                console.log('updateClass ' + JSON.stringify(this.currentClass));
            },

            /**
             * Broadcast selection has changed
             */
            broadcastSelectionWasChanged(mode) {
                var myEvent = 'selection-was-changed';
                caxEvent.$emit(myEvent, {
                    type: this.btnSelType,
                    id: this.btnSelId,
                    purpose: this.btnPurpose,
                    sender: 'toolbar-button'
                });
//                console.log('Broadcast from ToolbarButton: "' + myEvent + '", for ' + this.btnSelType + '.id ' + this.btnSelId);
            },

            refreshButton() {
                this.buttonIcon = this.getIcon(this.btnPurpose);
                this.updateClass();
            },

            reloadCriteria(idx) {
//                console.log('ToolbarButton.ReloadCriteria');
                this.selections = this.globalSelection;
                if (this.matchingCriteria) {
                    this.criteria = this.matchingCriteria;
                } else {
                    this.criteria = this.siblingCriteria;
                }
            },

            handleSelectionWasChanged() {
//                console.log('ToolbarButton.handleSelectionWasChanged');
                this.reloadCriteria();
                this.refreshButton();
            },

            getSiblingCriteria() {
//                console.log('ToolbarButton.getSiblingCriteria');
                let obj = this.$root.$data.btnCriteria;
                let type = this.btnSelType;
                let id = this.btnSelId;
                let choice = {};
                let i = 0;
                if (obj) {
                    if (obj.type === type && obj.value === id) {
                        choice = obj;
//                        console.log('ToolbarButton.getSiblingCriteria-obj ' + JSON.stringify(obj));
                    }
                }
                return choice;
            }
        }
    }
</script>
