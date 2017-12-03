<template>
    <div id="app-root">
        <div class="container-fluid">
            <div class="row">
                  <transition
                        name="animated-nav"
                        enter-active-class="animated bounceInLeft"
                        leave-active-class="animated bounceOutLeft"
                    >
                        <div v-if="navOpen" class="col-2" id="app-content-nav">
                            <p>Root router path: {{ $route.fullPath }}</p>
                            <ul class="nav flex-column">
                                <li class="nav-item"><router-link class="nav-link" to="/learnvue/app/home"><button class="btn btn-outline-primary">/home</button></router-link></li>
                                <li class="nav-item"><router-link class="nav-link" to="/learnvue/app/foo"><button class="btn btn-outline-primary">/foo</button></router-link></li>
                                <li class="nav-item"><router-link class="nav-link" to="/learnvue/app/bar"><button class="btn btn-outline-primary">/bar</button></router-link></li>
                            </ul>
                        </div>
                    </transition>
                <div class="col-10" id="app-content">
                    <button @click="toggleNav">ToggleNav</button>
                    <router-view></router-view>
                </div>
            </div>
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