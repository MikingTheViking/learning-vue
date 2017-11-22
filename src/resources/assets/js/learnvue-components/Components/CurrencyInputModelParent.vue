<template>
    <div>
        <currency-input 
            label="Price" 
            v-model="price"
        ></currency-input>
        <currency-input 
            label="Shipping" 
            v-model="shipping"
        ></currency-input>
        <currency-input 
            label="Handling" 
            v-model="handling"
        ></currency-input>
        <currency-input 
            label="Discount" 
            v-model="discount"
        ></currency-input>
        
        <p>Total: ${{ total }}</p>
    </div>
</template>
<script>

import CurrencyInputModelChild from './CurrencyInputModelChild.vue';

export default {
    data() {
        return {
            price: 0,
            shipping: 0,
            handling: 0,
            discount: 0
        };
    },
    computed: {
        total: function () {
            return ((
                this.price * 100 + 
                this.shipping * 100 + 
                this.handling * 100 - 
                this.discount * 100
            ) / 100).toFixed(2)
        }
    },
    components: {
        'currency-input': CurrencyInputModelChild
    }
}
</script>