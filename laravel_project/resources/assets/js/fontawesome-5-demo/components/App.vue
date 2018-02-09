<template>
    <div class="container-fluid">
            <transition-group
                name="animated-nav"
                enter-active-class="animated bounceInLeft"
                leave-active-class="animated bounceOutLeft"
                tag="div"
                class="row"
            >
                <div v-if="navOpen" class="col-4" id="app-content-nav" key="nav">
                        <!-- If you are using the "Solid" style you can simply use the icon name -->
                        <font-awesome-icon icon="spinner" />
                        <!-- Using another style needs a prefix in the following array format -->
                        <font-awesome-icon :icon="['fab', 'font-awesome']" />
                        <font-awesome-icon icon="spinner" spin />
                        <font-awesome-icon icon="spinner" pulse />
                        <font-awesome-icon icon="spinner" transform="shrink-6 left-4" />
                        <font-awesome-icon icon="spinner" :transform="{ rotate: 42 }" />


                        
                    <p>Icon : "<font-awesome-icon :icon="icon" />" Root router path: {{ $route.fullPath }}</p>
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
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
import FontAwesomeIcon from '@fortawesome/vue-fontawesome';
import { faCoffee } from '@fortawesome/fontawesome-free-solid';

export default {
    name: 'FAExample',
    created() {
        console.log('Fontawesome 5 Demo Vue app created!');
    },
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
        FontAwesomeIcon
    }

}
</script>

<style>

    .nav-closed {
        left:-100%;
    }

</style>