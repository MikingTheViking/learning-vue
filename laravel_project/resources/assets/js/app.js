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



//Vuex Shenanigans
import 'babel-polyfill';
//import { getAllMessages } from './store/actions'
import store from './components/app_router/store';

import AppRouter from './components/app_router/AppRouter.vue';

const app = new Vue({
    el: '#vue-router',
    store,
    render: h => h(AppRouter)
});


//Other Components
var login = new Vue({

    el: '#login-app',
    components: {
        Login
    }

});