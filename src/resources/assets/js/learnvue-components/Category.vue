<template>

    <div class="category">
    
        <h1>{{ message }}</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Vue Category</div>

                        <div class="panel-body">
                            <p>I'm an example component!</p>
                            <button v-on:click="counter += 1">{{ counter }}</button>
                        </div>
                    </div>
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

                message: 'Hello World',
                counter: 0

            };
        }

    }

</script>

<style lang="scss">

    .category {
        
        //background: black;
    }

</style>