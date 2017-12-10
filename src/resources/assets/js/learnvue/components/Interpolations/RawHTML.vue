<template>

    <div>
        <p>The mustache syntax interprets the data as plain text, not HTML, therefore escaping the contents. To output real html use the <code>v-html</code> directive to bind the raw HTML property.</p>
        <p>Sample with Mustache: {{ sampleRawHTML }}</p>
        <p>Sample using the v-html directive: <span v-html="sampleRawHTML"></span></p>
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'Raw HTML Interpolation',
                sampleRawHTML: '<span style="color:red">RED TEXT</span>'
            };
        }
    }

</script>

<style lang="scss">

</style>