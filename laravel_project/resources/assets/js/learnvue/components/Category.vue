<template>

    <div class="category">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">{{ this.title }} {{this.test}}</div>
                        <div class="panel-body category-panel-body">
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

                //title: 'Category Title'
                title:'boourns'

            };
        },
        components: {
            'subcategory': require('./Subcategory.vue')
        },
        props: ['test', 'title']
    }

</script>

<style lang="scss">

    .category {
        
        //background: black;
    }

    .category-panel-body {
        padding-bottom:0;
    }

</style>