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


Vue.component('child', {

    //declare the props
    props: ['myMessage'],
    //like data, the prop can be used inside templates and is also made available in the vm as this.message
    template: '<span>{{ myMessage }}</span>'

});

const app = new Vue({
    el: '#app'
});