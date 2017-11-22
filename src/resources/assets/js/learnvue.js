/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue';

//Vue.component('category', require('./learnvue-components/Category.vue'));
Vue.component('basicinstance', require('./learnvue-components/BasicInstance.vue'));
Vue.component('databindsample', require('./learnvue-components/DataBindSample.vue'));
Vue.component('instancemethods', require('./learnvue-components/InstanceMethods.vue'));

//interpolations
Vue.component('text-interpolation', require('./learnvue-components/Interpolations/Text.vue'));
Vue.component('raw-html-interpolation', require('./learnvue-components/Interpolations/RawHTML.vue'));
Vue.component('attributes-interpolation', require('./learnvue-components/Interpolations/Attributes.vue'));
Vue.component('javascript-expressions-interpolation', require('./learnvue-components/Interpolations/JavaScriptExpressions.vue'));

//directives
Vue.component('directive-sample', require('./learnvue-components/Directives/DirectiveSample.vue'));
Vue.component('arguments-directive', require('./learnvue-components/Directives/Arguments.vue'));
Vue.component('modifiers-directive', require('./learnvue-components/Directives/Modifiers.vue'));
Vue.component('shorthand-directive', require('./learnvue-components/Directives/Shorthands.vue'));

//computed properties and watchers
Vue.component('computed-property-sample', require('./learnvue-components/Computed-Properties/ComputedPropertySample.vue'));
Vue.component('complex-watch', require('./learnvue-components/Computed-Properties/ComplexWatch.vue'));

//class and style bindings
Vue.component('object-syntax-sample', require('./learnvue-components/Class-And-Style-Bindings/ObjectSyntax.vue'));
Vue.component('array-syntax-sample', require('./learnvue-components/Class-And-Style-Bindings/ArraySyntax.vue'));

//conditional rendering
Vue.component('conditional-rendering-sample', require('./learnvue-components/Conditional-Rendering/ReusableElementSample.vue'));
Vue.component('conditional-rendering-key-sample', require('./learnvue-components/Conditional-Rendering/ReusableElementsKey.vue'));

//list rendering
Vue.component('for-basic-sample', require('./learnvue-components/List-Rendering/ForBasicExample.vue'));
Vue.component('for-basic-with-index-sample', require('./learnvue-components/List-Rendering/ForBasicWithIndexExample.vue'));
Vue.component('for-object-value-sample', require('./learnvue-components/List-Rendering/ObjectValueExample.vue'));
Vue.component('for-object-key-value-sample', require('./learnvue-components/List-Rendering/ObjectKeyValueExample.vue'));
Vue.component('for-object-index-key-value-sample', require('./learnvue-components/List-Rendering/ObjectKeyValueIndexExample.vue'));
Vue.component('simple-todo-list', require('./learnvue-components/List-Rendering/SimpleTodoList.vue'));


//Event Handling
Vue.component('simple-on-event', require('./learnvue-components/Event-Handling/SimpleOnEvent.vue'));
Vue.component('simple-on-event-method', require('./learnvue-components/Event-Handling/SimpleOnEventMethod.vue'));
Vue.component('simple-inline', require('./learnvue-components/Event-Handling/SimpleInline.vue'));

//Form Input Binding
Vue.component('simple-text-binding', require('./learnvue-components/Form-Input-Bindings/TextModel.vue'));
Vue.component('simple-textarea-binding', require('./learnvue-components/Form-Input-Bindings/TextareaModel.vue'));
Vue.component('simple-checkbox-single-binding', require('./learnvue-components/Form-Input-Bindings/CheckboxSingle.vue'));
Vue.component('simple-checkbox-multiple-binding', require('./learnvue-components/Form-Input-Bindings/CheckboxMultiple.vue'));
Vue.component('radio-binding', require('./learnvue-components/Form-Input-Bindings/RadioModel.vue'));
Vue.component('select-binding', require('./learnvue-components/Form-Input-Bindings/SelectModel.vue'));
Vue.component('checkbox-value-binding', require('./learnvue-components/Form-Input-Bindings/CheckboxValueBinding.vue'));
Vue.component('select-options-binding', require('./learnvue-components/Form-Input-Bindings/SelectOptionsBinding.vue'));
Vue.component('lazy-modifier', require('./learnvue-components/Form-Input-Bindings/LazyModifier.vue'));


//components
Vue.component('prop-simple', require('./learnvue-components/Components/ComponentProps.vue'));
Vue.component('dynamic-props', require('./learnvue-components/Components/DynamicProps.vue'));
Vue.component('event-handling', require('./learnvue-components/Components/EventHandling.vue'));
Vue.component('currency-input-parent', require('./learnvue-components/Components/InputModelParent.vue'));
Vue.component('currency-input-model-parent', require('./learnvue-components/Components/CurrencyInputModelParent.vue'));


Vue.component('child', {

    //declare the props
    props: ['myMessage'],
    //like data, the prop can be used inside templates and is also made available in the vm as this.message
    template: '<span>{{ myMessage }}</span>'

});

const app = new Vue({
    el: '#app'
});