<template>

<div>
    <button @click="show = !show">
        Toggle render
    </button>
    <transition
    v-on:before-enter="beforeEnter"
    v-on:enter="enter"
    v-on:after-enter="afterEnter"
    v-on:enter-cancelled="enterCancelled"
    v-on:before-leave="beforeLeave"
    v-on:leave="leave"
    v-on:after-leave="afterLeave"
    v-on:leave-cancelled="leaveCancelled"
    >
        <p v-if="show">hello</p>
    </transition>
</div>

</template>

<script>


    export default {

        data() {
            return {
                show:true
            };
        },
        methods: {
            // --------
            // ENTERING
            // --------
            beforeEnter: function (el) {
                console.log('beforeEnter');
            },
            // the done callback is optional when
            // used in combination with CSS
            enter: function (el, done) {
                console.log('enter');
                done()
            },
            afterEnter: function (el) {
                console.log('afterEnter');
            },
            enterCancelled: function (el) {
                console.log('enterCancelled');
            },
            // --------
            // LEAVING
            // --------
            beforeLeave: function (el) {
                console.log('beforeLeave');
            },
            // the done callback is optional when
            // used in combination with CSS
            leave: function (el, done) {
                console.log('leave');
                done()
            },
            afterLeave: function (el) {
                console.log('afterLeave');
            },
            // leaveCancelled only available with v-show
            leaveCancelled: function (el) {
                console.log('leaveCancelled');
            }
        }
    }
</script>
