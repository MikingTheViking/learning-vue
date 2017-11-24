<template>
    <div>
        <input v-model="parentMsg">
        <br>
        <child v-bind:my-message="parentMsg"></child>
        <child :my-message="parentMsg"></child>
    </div>
</template>

<script>

import DynamicPropsChild from './DynamicPropsChild.vue';

export default {
    data() {
        return {
            parentMsg: ''
        };
    },
    components: {
        'child': DynamicPropsChild
    }
}
</script>