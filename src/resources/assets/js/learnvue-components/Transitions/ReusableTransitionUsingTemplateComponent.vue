<template>

    <transition
        appear
        name="special-transition"
        mode="out-in"
        v-on:before-enter="beforeEnter"
        v-on:after-enter="afterEnter"
        enter-active-class="animated tada"
        leave-active-class="animated bounceOutRight"
    >
        <slot>No content to be distributed. This is the default content for the reusable transition component.</slot>
    </transition>

</template>

<script>


export default {

    data() {
        return {}
    },
    created: function() {
        console.log('CREATED');
    },
    methods: {
        beforeEnter: function (el) {
            console.log('beforeEnter');
        },
        afterEnter: function (el) {
            console.log('afterEnter');
        }
    }

}


</script>

<style lang="scss">


</style>