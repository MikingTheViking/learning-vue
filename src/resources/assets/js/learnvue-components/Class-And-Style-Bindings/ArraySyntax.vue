<template>

    <div>
        <p>A list of classes can be passed as an array to <code>v-bind:class</code> to be applied.</p>
        <p><code>&lt;div v-bind:class="[activeClass, errorClass]"&gt;&lt;/div&gt;</code></p>
<pre>
data: {
    activeClass: 'active',
    errorClass: 'text-danger'
}
</pre>
        <p>Which will render: <code>&lt;div class="active text-danger"&gt;&lt;/div&gt;</code></p>

        <p>To togle a class in the list conditionally, use a ternary expression.</p>

        <p><code>&lt;div v-bind:class="[isActive ? activeClass : '', errorClass]"&gt;&lt;/div&gt;</code></p>

        <p>In the above cas, <code>errorClass</code> will always be applied, however <code>activeClass</code> will only be applied when <code>isActive</code> is truthy</p>

        <p><strong>NOTE:</strong> This can be quite verbose if there are multiple conditional classes, that's why it's possible to use the object syntax inside array syntax:</p>

        <p><code>&lt;div v-bind:class="[{ active: isActive }, errorClass]"&gt;&lt;/div&gt;</code></p>
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'Array Syntax Sample'

            };
        }
    }

</script>

<style lang="scss">
</style>