<template>
    <div>
        <div class="col-sm-6">
            <transition
                name="custom-classes-transition-1"
                enter-active-class="animated lightSpeedIn"
                leave-active-class="animated lightSpeedOut"
            >
                <button v-bind:key="on" @click="on = !on">{{ (on ? 'ON' : 'OFF') }}</button>
            </transition>
        </div>
        <div class="col-sm-6">
            <transition
                name="custom-classes-transition-2"
                enter-active-class="animated fadeInRight"
                leave-active-class="animated fadeOutLeft"
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