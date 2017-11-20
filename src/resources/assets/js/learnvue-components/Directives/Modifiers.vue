<template>

    <div>
        <p>Modifiers are special postfixes denoted by a dot which indicate that a directive should be bound in a special way: such as using <code>.prevent</code> to instruct the directive to call <code>event.preventDefault()</code> on the triggered event</p>
        <p><code v-html="codesample"></code></p>
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'Directive Sample',
                codesample: '&lt;form v-on:submit.prevent="onSubmit"&gt;...&lt;/form&gt;',
            };
        },
        methods: {
        }
    }

</script>

<style lang="scss">

</style>