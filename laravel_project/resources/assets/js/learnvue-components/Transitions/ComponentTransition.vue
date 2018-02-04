<template>

    <div>
        <div class="col-sm-4">
            <p>Select the component to be displayed on the right.</p>
            <input type="radio" id="v-a" value="v-a" v-model="view">
            <label for="v-a">A</label>
            <br>
            <input type="radio" id="v-b" value="v-b" v-model="view">
            <label for="v-b">B</label>
        </div>
        <div class="com-sm-8">
            <transition 
                name="component-fade" 
                mode="out-in"
                enter-active-class="animated fadeInRight"
                leave-active-class="animated fadeOutRight"
            >

                <component v-bind:is="view" />

            </transition>
        </div>

    </div>

</template>

<script>

import ComponentA from './ComponentTransitionChildA.vue';
import ComponentB from './ComponentTransitionChildB.vue';

export default {
    
    data() {

        return {
            view: 'v-a'
        }

    },
    components: {
        'v-a': ComponentA,
        'v-b': ComponentB
    }

}

</script>