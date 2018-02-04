<template>

    <div>
        <p>Mustaches cannot be used inside HTML attributes, use the <code>v-bind</code> directive.</p>
        <p><code v-html="codesample"></code></p>
        <button v-on:click="toggleSeen">Toggle "seen" to {{ !seen }}</button>
        <p v-if="seen">You can see this because seen = true!</p>
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'Directive Sample',
                codesample: '&lt;p v-if="seen"&gt;Not you see me!&lt;p/&gt;',
                seen: false
            };
        },
        methods: {
            toggleSeen: function() {
                this.seen = !this.seen;
            },
        }
    }

</script>

<style lang="scss">

</style>