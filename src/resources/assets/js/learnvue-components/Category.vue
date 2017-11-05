<template>

    <div class="category">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">{{ title }} {{this.test}}</div>
                        <div class="panel-body">
                            <button v-on:click="counter += 1">{{ counter }}</button>
                            <p><em>Category Contents (Subcategories)</em></p>
                            <subcategory></subcategory>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</template>

<script>

    export default {

        data() {

            return {

                title: 'Category Title',
                counter: 0

            };
        },
        components: {
            'subcategory': require('./Subcategory.vue')
        },
        props: ['test']

    }

</script>

<style lang="scss">

    .category {
        
        //background: black;
    }

</style>