<template>

    <div class="subcategory">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">{{ title }}</div>

                <div class="panel-body">

                    <p>I'm an example component!</p>
                    <div>
                        <counter />
                    </div>
                    <child my-message="woah this is a global child component with a prop 'my-message'"></child>

                </div>

            </div>
        </div>
    </div>

</template>

<script>

    export default {

        data() {

            return {

                title: 'Subcategory Title'

            };
        },
        components: {
            'counter': require('./Counter.vue')
        }
    }

</script>

<style lang="scss">

    .subcategory {
        
        //background: black;
    }

</style>