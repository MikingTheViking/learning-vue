/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 //Bootstrap inclusions
require('./bootstrap');

//  Fontawesome 5
import fontawesome from '@fortawesome/fontawesome';
import brands from '@fortawesome/fontawesome-free-brands';
import freebase from '@fortawesome/fontawesome-free-solid';

fontawesome.library.add(brands, freebase);


//  VueJS
import Vue from 'vue';

import LogoCube from './components/canvas_creation/LogoCube.vue';

Vue.component('logo-cube', LogoCube);

var WelcomeVueApp = new Vue({
    el: '#welcome-vue-app'
});
