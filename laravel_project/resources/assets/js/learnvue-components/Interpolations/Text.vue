<template>

    <div>
        <p>The most basic form of data binding is text interpolation using the "Mustache" syntax. </p>
        <p><code>Text Message: <span v-html="sampleplaceholder"></span></code></p>
        <p>Text Message: {{ msg }}</p>
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'Text Interpolation',
                msg: 'This is my Vue component msg text',
                sampleplaceholder: '{{ msg }}'
            };
        }
    }

</script>

<style lang="scss">

</style>