/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Velocity from 'velocity-animate';

//Highlight.js, for automatic code highlighting
const hljs = require('highlight.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import Vue from 'vue';
//import VueRouter from 'vue-router';


//Vuex Shenanigans
import 'babel-polyfill';
import 'babel-polyfill'
//import { getAllMessages } from './store/actions'
import store from './store';
import App from './learnvue-components/Routing/Home.vue';

Vue.config.debug = true;


//Vue.use(VueRouter);

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


//transitions
Vue.component('basic-opacity', require('./learnvue-components/Transitions/BasicOpacity.vue'));
Vue.component('advanced-opacity', require('./learnvue-components/Transitions/AdvancedOpacity.vue'));
Vue.component('basic-animation', require('./learnvue-components/Transitions/BasicAnimation.vue'));
Vue.component('advanced-animation', require('./learnvue-components/Transitions/AdvancedAnimation.vue'));
Vue.component('javascript-hooks', require('./learnvue-components/Transitions/JavaScriptHooks.vue'));
Vue.component('javascript-transition', require('./learnvue-components/Transitions/JavaScriptTransition.vue'));
Vue.component('transition-modes-none', require('./learnvue-components/Transitions/TransitionModesNone.vue'));
Vue.component('transition-modes-none-again', require('./learnvue-components/Transitions/TransitionModesNoneAgain.vue'));
Vue.component('transition-modes', require('./learnvue-components/Transitions/TransitionModes.vue'));
Vue.component('component-transition', require('./learnvue-components/Transitions/ComponentTransition.vue'));
Vue.component('list-transitions', require('./learnvue-components/Transitions/ListTransitions.vue'));
Vue.component('list-move-transitions', require('./learnvue-components/Transitions/ListMoveTransitions.vue'));
Vue.component('list-moves-and-transitions', require('./learnvue-components/Transitions/ListMovesAndTransitions.vue'));
Vue.component('staggered-list-transition', require('./learnvue-components/Transitions/StaggeredListTransitions.vue'));
Vue.component('reused-transition', require('./learnvue-components/Transitions/ReusedTransitionRoot.vue'));
Vue.component('dynamic-transition', require('./learnvue-components/Transitions/DynamicTransition.vue'));

Vue.component('reusable-transition-template-component', require('./learnvue-components/Transitions/ReusableTransitionUsingTemplateComponent.vue'));



//state transitions
Vue.component('animated-state-with-watcher', require('./learnvue-components/State-Transitions/AnimatedStateWithWatcher.vue'));

//reusability & composition
Vue.component('custom-directive', require('./learnvue-components/Custom-Directives/AutofocusInput.vue'));
Vue.component('directive-hook-arguments', require('./learnvue-components/Custom-Directives/CustomDirectiveHookArguments.vue'));



Vue.component('child', {

    //declare the props
    props: ['myMessage'],
    //like data, the prop can be used inside templates and is also made available in the vm as this.message
    template: '<span>{{ myMessage }}</span>'

});
/*
const app = new Vue({
    el: '#app'
});
*/

const app2 = new Vue({
    el: '#vuex-example',
    store,
    render: h => h(App)
});



const basic = new Vue({
    el: '#vue-basic-instance'
});

const data_bind = new Vue({
    el: '#vue-data-bind'
});

const instance_methods = new Vue({
    el: '#vue-instance-methods'
});

const text_interpolation = new Vue({
    el: '#vue-text-interpolation'
});

const raw_html_interpolation = new Vue({
    el: '#vue-raw-html-interpolation'
});

const attributes_interpolation = new Vue({
    el: '#vue-attributes-interpolation'
});

const javascript_expressions_interpolation = new Vue({
    el: '#vue-javascript-expressions-interpolation'
});

const directive_sample = new Vue({
    el: '#vue-directive-sample'
});

const arguments_directive = new Vue({
    el: '#vue-arguments-directive'
});

const modifiers_directive = new Vue({
    el: '#vue-modifiers-directive'
});

const shorthand_directive = new Vue({
    el: '#vue-shorthand-directive'
});

const computed_property_sample = new Vue({
    el: '#vue-computed-property-sample'
});

const complex_watch = new Vue({
    el: '#vue-complex-watch'
});

const object_syntax = new Vue({
    el: '#vue-object-syntax-sample'
});

const array_syntax = new Vue({
    el: '#vue-array-syntax-sample'
});

const conditional_rendering = new Vue({
    el: '#vue-conditional-rendering-sample'
});

const conditional_rendering_key = new Vue({
    el: '#vue-conditional-rendering-key-sample'
});

const for_basic = new Vue({
    el: '#vue-for-basic-sample'
});

const for_basic_with_index = new Vue({
    el: '#vue-for-basic-with-index'
});

const for_object_value_sample = new Vue({
    el: '#vue-for-object-value-sample'
});

const for_object_key_value_sample = new Vue({
    el: '#vue-for-object-key-value-sample'
    
});

const for_object_index_key_value_sample = new Vue({
    el: '#vue-for-object-index-key-value-sample'
});

const simple_todo = new Vue({
    el: '#vue-simple-todo-list'
});

const simple_on_event = new Vue({
    el: '#vue-simple-on-event'
});

const simple_on_event_method = new Vue({
    el: '#vue-vue-simple-on-event-method'
});

const simple_inline = new Vue({
    el: '#vue-simple-inline'
});

const simple_text_binding = new Vue({
    el: '#vue-simple-text-binding'
});

const simple_textarea_binding = new Vue({
    el: '#vue-simple-textarea-binding'
});

const simple_checkbox_single_binding = new Vue({
    el: '#vue-simple-checkbox-single-binding'
});

const simple_checkbox_multiple_binding = new Vue({
    el: '#vue-simple-checkbox-multiple-binding'
});

const radio_binding = new Vue({
    el: '#vue-radio-binding'
});

const select_binding = new Vue({
    el: '#vue-select-binding'
});

const checkbox_value_binding = new Vue({
    el: '#vue-checkbox-value-binding'
});

const select_options_binding = new Vue({
    el: '#vue-select-options-binding'
});

const lazy_modifier = new Vue({
    el: '#vue-lazy-modifier'
});

const prop_simple = new Vue({
    el: '#vue-prop-simple'
});

const dynamic_props = new Vue({
    el: '#vue-dynamic-props'
});

const event_handling = new Vue({
    el: '#vue-event-handling'
});

const currency_input = new Vue({
     el: '#vue-currency-input-parent'
});

const currency_input_model = new Vue({
    el: '#vue-currency-input-model-parent'
});

const basic_opacity = new Vue({
    el: '#vue-basic-opacity'
});

const advanced_opacity = new Vue({
    el: '#vue-advanced-opacity'
});

const basic_animation = new Vue({
    el: '#vue-basic-animation'
});

const advanced_animation = new Vue({
    el: '#vue-advanced-animation'
});

const javascript_hooks = new Vue({
    el: '#vue-javascript-hooks'
});

const javascript_transition = new Vue({
    el: '#vue-javascript-transition'
});

const transition_modes_none = new Vue({
    el: '#vue-transition-modes-none'
});

const transition_modes_none_again = new Vue({
    el: '#vue-transition-modes-none-again'
});

const transition_modes = new Vue({
    el: '#vue-transition-modes'
});

const component_transition = new Vue({
    el: '#vue-component-transition'
});

const list_transition = new Vue({ el: '#vue-list-transition'});

const list_move_transition = new Vue({
    el: '#vue-list-move-transitions'
});

const list_move_transition_with_vuex = new Vue({
    el: '#vue-list-move-transitions-with-vuex', store
});

const list_moves_and_transitions = new Vue({ el: '#vue-list-moves-and-transitions'});

const staggered_list_transition = new Vue({ el: '#vue-staggered-list-transition' });

const reused_transition = new Vue({ el: '#vue-reused-transition' });

const dynamic_transition = new Vue({ el: '#vue-dynamic-transition'});

const animated_state_with_watcher = new Vue({ el: '#vue-animated-state-with-watcher'});

const custom_directive = new Vue({ el: '#vue-custom-directive'});

const directive_hook_arguments = new Vue({ el: '#vue-directive-hook-arguments'});





















//Highlight.js for code samples styling

$('pre').each(function (i, block) {
    hljs.highlightBlock(block);
});


