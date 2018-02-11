/**
 * app.js
 */

require('./bootstrap');

//Fontawesome 5
import fontawesome from '@fortawesome/fontawesome';
import brands from '@fortawesome/fontawesome-free-brands';
import freebase from '@fortawesome/fontawesome-free-solid';

fontawesome.library.add(brands, freebase);

//Vue
import Vue from 'vue';

/*
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const Foo = {
    template: '<div>foo</div>'
}
const Bar = {
    template: '<div>bar</div>'
}
const User = {
    template: '<div>User: {{ $route.params.id }}</div>'
}

const routes = [
    {
        path: '/foo',
        component: Foo
    },
    {
        path: '/bar',
        component: Bar
    },
    {
        path: '/user/:id',
        component: User
    }
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})
*/

import router from '../js/components/app_router';


//Vuex Shenanigans
import 'babel-polyfill';
//import { getAllMessages } from './store/actions'
import store from './components/app_router/store';

import AppRouter from './components/app_router/AppRouter.vue';

const app = new Vue({
    el: '#router-app',
    router,
    store,
    render: h => h(AppRouter)
});