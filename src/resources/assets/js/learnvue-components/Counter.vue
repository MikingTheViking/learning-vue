<template>

    <span class="counter">
        <button v-on:click="counter += 1">{{ counter }}</button>
    </span>
    

</template>

<script>

    export default {

        data() {

            return {

                counter: 0

            };
        }
    }

</script>

<style lang="scss">

    .counter {
        
        //background: black;
    }

</style>