<template>

    <p>This is a basic Vue component. No interactivity. <code v-html="basicplaceholder"></code></p>
    
    
</template>

<script>

    var placeholder = 'something';

    export default {

        data() {

            return {

                title:'Basic Instance',
                basicplaceholder: '{{ placeholder }}'
            };
        }
    }

</script>

<style lang="scss">

</style>