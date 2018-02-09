<template>
    <div id="app-root">
        <h1><i class="fab fa-facebook"></i></h1>
        <div class="container-fluid">
            <transition-group
                name="animated-nav"
                enter-active-class="animated bounceInLeft"
                leave-active-class="animated bounceOutLeft"
                tag="div"
                class="row"
            >
                <div v-if="navOpen" class="col-4" id="app-content-nav" key="nav">
                    <p>Root router path: {{ $route.fullPath }}</p>
                    <ul class="nav flex-column">
                        <li class="nav-item"><router-link class="nav-link" to="/learnvue/app/home"><button class="btn btn-outline-primary">/home</button></router-link></li>
                        <li class="nav-item"><router-link class="nav-link" to="/learnvue/app/what-is-it"><button class="btn btn-outline-primary">/what-is-it</button></router-link></li>
                        <li class="nav-item"><router-link class="nav-link" to="/learnvue/app/vue-instance"><button class="btn btn-outline-primary">/vue-instance</button></router-link></li>
                        <li class="nav-item"><router-link class="nav-link" to="/learnvue/app/template-syntax"><button class="btn btn-outline-primary">/template-syntax</button></router-link></li>
                        <li class="nav-item"><router-link class="nav-link" to="/learnvue/app/computed-properties-and-watchers"><button class="btn btn-outline-primary">/computed-properties-and-watchers</button></router-link></li>
                        <li class="separator"></li>
                        <li class="nav-item"><router-link class="nav-link" to="/learnvue/app/foo"><button class="btn btn-outline-primary">/foo</button></router-link></li>
                        <li class="nav-item"><router-link class="nav-link" to="/learnvue/app/bar"><button class="btn btn-outline-primary">/bar</button></router-link></li>
                    </ul>
                </div>
                <div class="col" id="app-content" key="content">
                    <button @click="toggleNav">ToggleNav</button>
                    <router-view></router-view>
                </div>
            </transition-group>
            
        </div>

    </div>
    
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

import DynamicCategory from './DynamicCategory';

export default {
    computed: mapGetters({
        navOpen: 'getNavState'
    }),
    methods: mapActions([
        'toggleNav'
    ]),
    watch: {
        navOpen: function (newVal) {
            console.log('navOpen changed!');
        }
    },
    components: {
        'dynamic-category': DynamicCategory
    }
}
</script>

<style lang="scss" scoped>


    .nav-closed {
        left:-100%;
    }
    
</style>