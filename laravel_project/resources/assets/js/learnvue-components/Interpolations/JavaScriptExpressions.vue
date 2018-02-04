<template>

    <div>
        <p>Vue.js suports the full power of JavaScript expressions inside all data bindings.</p> 
        <p><code v-html="sample1"></code></p>
        <p><code v-html="sample2"></code></p>
        <p><code v-html="sample3"></code></p>
        <p><strong>NOTE: </strong> each binding can only contain <strong>one single expression</strong>. So the following would not work:</p>
        <p><code v-html="sample4"></code></p>
        <p><code v-html="sample5"></code></p>
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'JavaScript Expression Interpolation',
                sample1: '{{ number + 1 }}',
                sample2: '{{ ok ? \'YES\' : \'NO\'}}',
                sample3: '{{ message.split(\' \').reverse().join(\' \') }}',
                sample4: '{{ var a = 1 }}',
                sample5: '{{ if (ok) { return message } }}',
            };
        }
    }

</script>

<style lang="scss">

</style>