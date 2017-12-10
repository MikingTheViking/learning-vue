require('../bootstrap');

//Highlight.js, for automatic code highlighting
const hljs = require('highlight.js');

import Vue from 'vue';
import Velocity from 'velocity-animate';

import VueRouter from 'vue-router';

//Vuex Shenanigans
import 'babel-polyfill';

import { sync } from 'vuex-router-sync';
import store from './store';
import router from './router';
const unsync = sync(store, router) // done. Returns an unsync callback fn


//import App from './learnvue-components/Routing/Home.vue';
//import ListTransition from './learnvue-components/Transitions/ListMoveTransitionsWithVuex';

Vue.config.debug = true;

//
// VUE ROUTER
//

import AppRouter from './components/App.vue';

//Add fontawesome components globally (instead of explicitly selected).... this is for ease in first iteration
//TODO: switch to importing as required
import fontawesome from '@fortawesome/fontawesome'
import brands from '@fortawesome/fontawesome-free-brands'
import { faSpinner } from '@fortawesome/fontawesome-free-solid'

fontawesome.library.add(brands, faSpinner)

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


