<template>
    <div id="counter-event-example">
        <p>{{ total }}</p>
        <button-counter v-on:increment="incrementTotal"></button-counter>
        <button-counter v-on:increment="incrementTotal"></button-counter>
    </div>
</template>
<script>

import EventHandlingChild from './EventHandlingChild.vue';

export default {
    data() {
        return {
            total: 0
        }
    },
    methods: {
        incrementTotal: function () {
            this.total += 1;
        }
    },
    components: {
        'button-counter': EventHandlingChild
    }
}
</script>