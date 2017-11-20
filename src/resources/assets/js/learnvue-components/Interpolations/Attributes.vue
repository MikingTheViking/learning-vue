<template>

    <div>
        <p>Mustaches cannot be used inside HTML attributes, use the <code>v-bind</code> directive.</p>
        <p v-html="samplecode"></p>
        <p>For boolean attributes, their mere existence implies <code>true</code>. If the value of the boolean is <code>null</code>, <code>undefined</code>, or <code>false</code> then the attribute will not be included on the rendered element.</p>
        <p><code v-html="boundCode"></code></p>
        <button v-bind:disabled="isDisabled">isDisabled = {{isDisabled}}</button>
        <button v-bind:disabled="!isDisabled">isDisabled = {{!isDisabled}}</button>
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'Raw HTML Interpolation',
                samplecode: '<code>&lt;div v-bind:id="dynamicId"&gt;&lt;/div&gt;</code>',
                isDisabled: true,
                boundCode: '&lt;button v-bind:disabled="isDisabled"&gt;'
            };
        }
    }

</script>

<style lang="scss">

</style>