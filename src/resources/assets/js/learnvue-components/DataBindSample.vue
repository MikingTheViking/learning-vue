<template>

    <div>
        <p>This is a demonstration of the data-binding for vue, clicking will increment the counter variable, triggering an update for this component.</p>
        <div class="col-sm-8 col-sm-offset-2">
            <button role="button" class="btn btn-default btn-block" v-on:click="counter += 1">Click me to increment the counter variable of this Vue component: <strong>{{ counter }}</strong></button>
        </div>
    </div>
    

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
        
        background: black;
    }

</style>