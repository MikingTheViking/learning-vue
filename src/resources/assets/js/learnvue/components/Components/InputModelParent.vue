<template>
    <div>
        <currency-input v-model="price"></currency-input>
        <p>The value you had entered was {{ price }}</p>
    </div>
</template>

<script>

import InputModel from './InputModel.vue'

export default {
    data() {
        return {
            price: 0
        };
    },
    components: {
        'currency-input': InputModel
    }
}
</script>