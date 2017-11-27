<template>
    <transition
        name="custom-classes-transition"
        enter-active-class="animated tada"
        leave-active-class="animated bounceOutRight"
    >
        <button v-bind:key="on" @click="on = !on">{{ (on ? 'ON' : 'OFF') }}</button>
    </transition>
</template>

<script>

export default {

    data() {

        return {
            on: true
        }

    }

}

</script>