<template>

    <div>
        <p>Some directives take an "argument", donted by a colon after the directive name. Such as <code>v-bind</code> which binds the element's attributes to the value of the given expression.</p>
        <p><code v-html="codesample"></code></p>
        <p>Another example is using the <code>v-on</code> directive, which listens to DOM events with the argument being the event name ot listen to.</p>
        <p><code v-html="codesampleon"></code></p>
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'Directive Sample',
                codesample: '&lt;a v-bind:href="url"&gt;...',
                codesampleon: '&lt;a v-on:click="doSomething"&gt;....&lt;/a&gt;'
            };
        },
        methods: {
        }
    }

</script>

<style lang="scss">

</style>