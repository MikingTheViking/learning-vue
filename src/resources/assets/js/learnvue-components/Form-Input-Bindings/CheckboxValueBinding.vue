<template>
    <div>
        <p>Check and uncheck the box to apply the bound values to <code>toggle</code>.</p>
        <input
        type="checkbox"
        v-model="toggle"
        v-bind:true-value="a"
        v-bind:false-value="b"
        > the bound value is: {{ toggle }}
    </div>
</template>

<script>
export default {
    data() {
        return {
            toggle: '',
            a: 'something',
            b: 'something else'
        };
    },
    watch: {
        toggle: function() {
            console.log('toggle changed: ' + this.toggle);
        }
    }
}
</script>