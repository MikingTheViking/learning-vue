require('./bootstrap');


//Highlight.js, for automatic code highlighting
const hljs = require('highlight.js');


import Vue from 'vue';
import Velocity from 'velocity-animate';


import VueRouter from 'vue-router';


//Vuex Shenanigans
import 'babel-polyfill';
import 'babel-polyfill'


import { sync } from 'vuex-router-sync';
import store from './store';
import router from './router';
const unsync = sync(store, router) // done. Returns an unsync callback fn


import App from './learnvue-components/Routing/Home.vue';
import ListTransition from './learnvue-components/Transitions/ListMoveTransitionsWithVuex';


Vue.config.debug = true;



//Vue.component('category', require('./learnvue-components/Category.vue'));
//Vue.component('basicinstance', require('./learnvue-components/BasicInstance.vue'));
import BasicInstance from './learnvue-components/BasicInstance.vue';
import DataBindSample from './learnvue-components/DataBindSample.vue';
import InstanceMethods from './learnvue-components/InstanceMethods.vue';
Vue.component('basicinstance', BasicInstance);
Vue.component('databindsample', DataBindSample);
Vue.component('instancemethods', InstanceMethods);

//interpolations
import TextInterpolation from './learnvue-components/Interpolations/Text.vue';
import RawHTML from './learnvue-components/Interpolations/RawHTML.vue';
import AttributesInterpolation from './learnvue-components/Interpolations/Attributes.vue';
import JavascriptInterpolation from './learnvue-components/Interpolations/JavaScriptExpressions.vue';
Vue.component('text-interpolation', TextInterpolation);
Vue.component('raw-html-interpolation', RawHTML);
Vue.component('attributes-interpolation', AttributesInterpolation);
Vue.component('javascript-expressions-interpolation', JavascriptInterpolation);

//directives
import DirectiveSample from './learnvue-components/Directives/DirectiveSample.vue';
import ArgumentsDirective from './learnvue-components/Directives/Arguments.vue';
import ModifiersDirective from './learnvue-components/Directives/Modifiers.vue';
import ShorthandsDirective from './learnvue-components/Directives/Shorthands.vue';
Vue.component('directive-sample', DirectiveSample);
Vue.component('arguments-directive', ArgumentsDirective);
Vue.component('modifiers-directive', ModifiersDirective);
Vue.component('shorthand-directive', ShorthandsDirective);

//computed properties and watchers
import ComputedProperty from './learnvue-components/Computed-Properties/ComputedPropertySample.vue';
import ComplexWatch from './learnvue-components/Computed-Properties/ComplexWatch.vue';
Vue.component('computed-property-sample', ComputedProperty);
Vue.component('complex-watch', ComplexWatch);

//class and style bindings
import ObjectSyntax from './learnvue-components/Class-And-Style-Bindings/ObjectSyntax.vue';
import ArraySyntax from './learnvue-components/Class-And-Style-Bindings/ArraySyntax.vue';
Vue.component('object-syntax-sample', ObjectSyntax);
Vue.component('array-syntax-sample', ArraySyntax);

//conditional rendering
import ConditionalRendering from './learnvue-components/Conditional-Rendering/ReusableElementSample.vue';
import ConditionalRenderingKey from './learnvue-components/Conditional-Rendering/ReusableElementsKey.vue';
Vue.component('conditional-rendering-sample', ConditionalRendering);
Vue.component('conditional-rendering-key-sample', ConditionalRenderingKey);

//list rendering
import ForExample from './learnvue-components/List-Rendering/ForBasicExample.vue';
import ForWithIndex from './learnvue-components/List-Rendering/ForBasicWithIndexExample.vue';
import ObjectValue from './learnvue-components/List-Rendering/ObjectValueExample.vue';
import ObjectKeyValue from './learnvue-components/List-Rendering/ObjectKeyValueExample.vue';
import ObjectIndexKeyValue from './learnvue-components/List-Rendering/ObjectKeyValueIndexExample.vue';
import ToDoList from './learnvue-components/List-Rendering/SimpleTodoList.vue';
Vue.component('for-basic-sample', ForExample);
Vue.component('for-basic-with-index-sample', ForWithIndex);
Vue.component('for-object-value-sample', ObjectValue);
Vue.component('for-object-key-value-sample', ObjectKeyValue);
Vue.component('for-object-index-key-value-sample', ObjectIndexKeyValue);
Vue.component('simple-todo-list', ToDoList);


//Event Handling
import SimpleOnEvent from './learnvue-components/Event-Handling/SimpleOnEvent.vue';
import SimpleOnEventMethod from './learnvue-components/Event-Handling/SimpleOnEventMethod.vue';
import SimpleInline from './learnvue-components/Event-Handling/SimpleInline.vue';
Vue.component('simple-on-event', SimpleOnEvent);
Vue.component('simple-on-event-method', SimpleOnEventMethod);
Vue.component('simple-inline', SimpleInline);

//Form Input Binding
import SimpleTextBinding from './learnvue-components/Form-Input-Bindings/TextModel.vue';
import SimpleTextAreaBinding from './learnvue-components/Form-Input-Bindings/TextareaModel.vue';
import SimpleCheckboxSingleBinding from './learnvue-components/Form-Input-Bindings/CheckboxSingle.vue';
import SimpleCheckboxMultipleBinding from './learnvue-components/Form-Input-Bindings/CheckboxMultiple.vue';
import RadioBinding from './learnvue-components/Form-Input-Bindings/RadioModel.vue';
import SelectBinding from './learnvue-components/Form-Input-Bindings/SelectModel.vue';
import CheckboxBinding from './learnvue-components/Form-Input-Bindings/CheckboxValueBinding.vue';
import SelectOptionsBinding from './learnvue-components/Form-Input-Bindings/SelectOptionsBinding.vue';
import LazyModifier from './learnvue-components/Form-Input-Bindings/LazyModifier.vue';
Vue.component('simple-text-binding', SimpleTextBinding);
Vue.component('simple-textarea-binding', SimpleTextAreaBinding);
Vue.component('simple-checkbox-single-binding', SimpleCheckboxSingleBinding);
Vue.component('simple-checkbox-multiple-binding', SimpleCheckboxMultipleBinding);
Vue.component('radio-binding', RadioBinding);
Vue.component('select-binding', SelectBinding);
Vue.component('checkbox-value-binding', CheckboxBinding);
Vue.component('select-options-binding', SelectOptionsBinding);
Vue.component('lazy-modifier', LazyModifier);

//components
import PropSimple from './learnvue-components/Components/ComponentProps.vue';
import DynamicProps from './learnvue-components/Components/DynamicProps.vue';
import EventHandling from './learnvue-components/Components/EventHandling.vue';
import CurrencyInput from './learnvue-components/Components/InputModelParent.vue';
import CurrencyModel from './learnvue-components/Components/CurrencyInputModelParent.vue';
Vue.component('prop-simple', PropSimple);
Vue.component('dynamic-props', DynamicProps);
Vue.component('event-handling', EventHandling);
Vue.component('currency-input-parent', CurrencyInput);
Vue.component('currency-input-model-parent', CurrencyModel);


//transitions
import BasicOpacity from './learnvue-components/Transitions/BasicOpacity.vue';
import AdvancedOpacity from './learnvue-components/Transitions/AdvancedOpacity.vue';
import BasicAnimation from './learnvue-components/Transitions/BasicAnimation.vue';
import AdvancedAnimation from './learnvue-components/Transitions/AdvancedAnimation.vue';
import JavascriptHooks from './learnvue-components/Transitions/JavaScriptHooks.vue';
import JavascriptTransition from './learnvue-components/Transitions/JavaScriptTransition.vue';
import JavascriptModesNone from './learnvue-components/Transitions/TransitionModesNone.vue';
import JavascriptModesNoneAgain from './learnvue-components/Transitions/TransitionModesNoneAgain.vue';
import TransitionModes from './learnvue-components/Transitions/TransitionModes.vue';
import ComponentTransition from './learnvue-components/Transitions/ComponentTransition.vue';
import ListTransitions from './learnvue-components/Transitions/ListTransitions.vue';
import ListMoveTransitions from './learnvue-components/Transitions/ListMoveTransitions.vue';
import ListMovesAndTransitions from './learnvue-components/Transitions/ListMovesAndTransitions.vue';
import StaggeredListTransition from './learnvue-components/Transitions/StaggeredListTransitions.vue';
import ReusedTransitionRoot from './learnvue-components/Transitions/ReusedTransitionRoot.vue';
import DynamicTransition from './learnvue-components/Transitions/DynamicTransition.vue';
Vue.component('basic-opacity', BasicOpacity);
Vue.component('advanced-opacity', AdvancedOpacity);
Vue.component('basic-animation', BasicAnimation);
Vue.component('advanced-animation', AdvancedAnimation);
Vue.component('javascript-hooks', JavascriptHooks);
Vue.component('javascript-transition', JavascriptTransition);
Vue.component('transition-modes-none', JavascriptModesNone);
Vue.component('transition-modes-none-again', JavascriptModesNoneAgain);
Vue.component('transition-modes', TransitionModes);
Vue.component('component-transition', ComponentTransition);
Vue.component('list-transitions', ListTransitions);
Vue.component('list-move-transitions', ListMoveTransitions);
Vue.component('list-moves-and-transitions', ListMovesAndTransitions);
Vue.component('staggered-list-transition', StaggeredListTransition);
Vue.component('reused-transition', ReusedTransitionRoot);
Vue.component('dynamic-transition', DynamicTransition);

import ReusableTransitionTemplate from './learnvue-components/Transitions/ReusableTransitionUsingTemplateComponent.vue';
Vue.component('reusable-transition-template-component', ReusableTransitionTemplate);



//state transitions
import AnimatedStateWithWatcher from './learnvue-components/State-Transitions/AnimatedStateWithWatcher.vue';
Vue.component('animated-state-with-watcher', AnimatedStateWithWatcher);

//reusability & composition
import AutofocusInput from './learnvue-components/Custom-Directives/AutofocusInput.vue';
import CustomDirectiveHooks from './learnvue-components/Custom-Directives/CustomDirectiveHookArguments.vue';
Vue.component('custom-directive', AutofocusInput);
Vue.component('directive-hook-arguments', CustomDirectiveHooks);


//vuex
/*
const app2 = new Vue({
    el: '#vuex-example',
    store,
    render: h => h(App)
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
    el: '#vue-simple-on-event-method'
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
    el: '#vue-list-move-transitions-with-vuex', 
    store,
    render: h => h(ListTransition)
});

const list_moves_and_transitions = new Vue({ el: '#vue-list-moves-and-transitions'});

const staggered_list_transition = new Vue({ el: '#vue-staggered-list-transition' });

const reused_transition = new Vue({ el: '#vue-reused-transition' });

const dynamic_transition = new Vue({ el: '#vue-dynamic-transition'});

const animated_state_with_watcher = new Vue({ el: '#vue-animated-state-with-watcher'});

const custom_directive = new Vue({ el: '#vue-custom-directive'});

const directive_hook_arguments = new Vue({ el: '#vue-directive-hook-arguments'});

*/


//
// VUE ROUTER
//

import AppRouter from './learnvue-components/App.vue';



// 1. Use plugin.
// This installs <router-view> and <router-link>,
// and injects $router and $route to all router-enabled child components
Vue.use(VueRouter);



const appRouter = new Vue({
    el: '#router-app',
    store,
    router,
    render: h => h(AppRouter)
});



//
//
//
//  OTHER INITIALIZATIONS
//
//
//
//Highlight.js for code samples styling

$('pre').each(function (i, block) {
    hljs.highlightBlock(block);
});


