<template>
    <div>
        <div class="col-sm-6">
            <p>Out then in:</p>
            <transition
                name="out-then-in"
                enter-active-class="animated lightSpeedIn"
                leave-active-class="animated lightSpeedOut"
                mode="out-in"
            >
                <button v-bind:key="on" @click="on = !on">{{ (on ? 'ON' : 'OFF') }}</button>
            </transition>
        </div>
        <div class="col-sm-6">
            <p>In then out:</p>
            <transition
                name="in-then-out"
                enter-active-class="animated fadeInLeft"
                leave-active-class="animated fadeOutRight"
                mode="in-out"
            >
                <button v-bind:key="on" @click="on = !on">{{ (on ? 'ON' : 'OFF') }}</button>
            </transition>
        </div>
    </div>

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