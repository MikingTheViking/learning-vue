<template>

    <div class="subcategory">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">{{ title }}</div>

                <div class="panel-body">
                    <p>I'm an example component!</p>
                    <button v-on:click="counter += 1">{{ counter }}</button>
                </div>
            </div>
        </div>
        <child my-message="woah this is a global child component with a prop 'my-message'"></child>
    </div>
    

</template>

<script>

    export default {

        data() {

            return {

                title: 'Subcategory Title',
                counter: 0

            };
        }

    }

</script>

<style lang="scss">

    .subcategory {
        
        //background: black;
    }

</style>