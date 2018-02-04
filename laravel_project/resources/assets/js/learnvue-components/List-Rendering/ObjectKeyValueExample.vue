<template>

    <div>
        <p>The following list is being rendered using <code>v-for</code> retrieving both the key and value of the properties.</p>
        <pre>&lt;ul&gt;
    &lt;li v-for="(value, key) in object"&gt;
        {{ sample }}
    &lt;/li&gt;
        </pre>
        <ul>
            <li v-for="(value, key) in object">
                {{ key }}: {{ value }}
            </li>
        </ul>
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'For Directive Basic Sample',
                object: {
                    firstName: 'John',
                    lastName: 'Doe',
                    age: 30
                },
                sample: '{{ key }}: {{ value }}'
            };
        }
    }

</script>

<style lang="scss">
</style>