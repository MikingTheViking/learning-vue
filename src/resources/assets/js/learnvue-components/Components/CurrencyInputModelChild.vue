<template>
    <div>
        <label v-if="label">{{ label }}</label>
        $ <input ref="input" v-bind:value="value" v-on:input="updateValue($event.target.value)" />
    </div>
</template>

<script>
export default {
    props: {
        value: {
            type: Number,
            default: 0
        },
        label: {
            type: String,
            default: ''
        }
    },
    mounted: function () {
        //console.log('mounted');
        //this.formatValue()
        //console.log('done mounting');
    },
    methods: {
        updateValue: function (value) {
            /*
            var formattedValue = value
                // Remove whitespace on either side
                .trim()
                // Shorten to 2 decimal places
                .slice(
                0,
                value.indexOf('.') === -1
                    ? value.length
                    : value.indexOf('.') + 3
                )*/
            // If the value was not already normalized,
            // manually override it to conform
            //if (formattedValue !== value) {
            //    this.$refs.input.value = formattedValue
            //}
            // Emit the number value through the input event
            //this.$emit('input', Number(formattedValue))
            this.$emit('input', Number(value))
        }
    }
}
</script>