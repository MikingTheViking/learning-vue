<template>

    <div>
        <p>Modifiers are special postfixes denoted by a dot which indicate that a directive should be bound in a special way: such as using <code>.prevent</code> to instruct the directive to call <code>event.preventDefault()</code> on the triggered event</p>
        <hr />
        <div class="col-sm-6">
            <p><code>v-bind</code> Shorthand:</p>
            <p><code v-html="bindsamplefull"></code></p>
            <p><code v-html="bindsampleshort"></code></p>
        </div>
        <div class="col-sm-6">
            <p><code>v-on</code> Shorthand:</p>
            <p><code v-html="onsamplefull"></code></p>
            <p><code v-html="onsampleshort"></code></p>
        </div>
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'Directive Shorthand Sample',
                bindsamplefull: '&lt;a v-bind:href="url"&gt;....&lt;/a&gt;',
                bindsampleshort: '&lt;a :href="url"&gt;....&lt;/a&gt;',
                onsamplefull: '&lt;a v-on:client="doSomething"&gt;....&lt;/a&gt;',
                onsampleshort: '&lt;a @href="doSomething"&gt;....&lt;/a&gt;',
            };
        },
        methods: {
        }
    }

</script>

<style lang="scss">

</style>