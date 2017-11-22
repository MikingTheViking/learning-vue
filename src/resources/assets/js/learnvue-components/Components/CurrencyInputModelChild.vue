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
        console.log('mounted');
        //this.formatValue()
        console.log('done mounting');
    },
    methods: {
        updateValue: function (value) {
            /*
            var result = currencyValidator.parse(value, this.value);
            if (result.warning) {
                this.$refs.input.value = result.value;
            }
            */
            console.log('updating value ' + value);
            //this.$refs.input.value = value;
            this.$emit('input', this.value);
        }
    }
}
</script>