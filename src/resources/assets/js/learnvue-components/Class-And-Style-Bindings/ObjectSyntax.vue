<template>

    <div>
        <button v-on:click="toggleActive">Toggle Active to {{ !isActive }}</button>
        <button v-on:click="toggleError">Toggle Error to {{ !hasError }}</button>
        <p v-bind:class="{ active:isActive, 'text-danger': hasError }">This node {{ isActive ? ' is not active ' : ' is active ' }} and {{ hasError ? ' and has an error' : ' and doesn\'t have an error' }}.</p>
        <p><code>&lt;div v-bind:class="{ active: isActive, 'text-danger': hasError}"&gt;&lt;/div&gt;</code></p>
        <hr />
        <p><code>v-bind:class</code> can also co-exist with a plain <code>class</code> attribute:</p>
        <p><code>&lt;div class="staticclass" v-bind:class="{ active: isActive, 'text-danger': hasError}"&gt;&lt;/div&gt;</code></p>
        <p class="staticclass" v-bind:class="{ active:isActive, 'text-danger': hasError }">This node {{ isActive ? ' is not active ' : ' is active ' }} and {{ hasError ? ' and has an error' : ' and doesn\'t have an error' }}.</p>
        <hr />
        <p>The bound object does not have to be inline, it can be defined in the properties.</p>
        <p><code>&lt;div v-bind:class="classObject"&gt;&lt;/div&gt;</code></p>
<pre>
data: {
    classObject: {
        active: true,
        'text-danger': false
    }
}</pre>
<pre>
computed: {
    classObject: function () {
        return {
            active: this.isActive && !this.hasError,
            'text-danger': this.hasError
        }
    }
}
</pre>
        <p v-bind:class="classObject"><code>classObject</code> binding</p>

    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'Object Syntax Sample',
                isActive: false,
                hasError: false

            };
        },
        methods: {
            toggleActive: function(){
                this.isActive = !this.isActive;
            },
            toggleError: function() {
                this.hasError = !this.hasError;
            }
        },
        computed: {
            classObject: function() {
                return {
                    active: this.isActive && !this.hasError,
                    'text-danger': this.hasError
                }
            }
        }
    }

</script>

<style lang="scss">
p.staticclass {
    background:#fafafa;
}
p.active {
    border: blue 1px solid;
}
</style>