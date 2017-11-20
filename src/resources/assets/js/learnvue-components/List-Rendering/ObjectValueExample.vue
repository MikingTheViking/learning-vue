<template>

    <div>
        <p>The following list is being rendered using <code>v-for</code>.</p>
        <ul>
            <li v-for="value in object">
                {{ value }}
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
                }
            };
        }
    }

</script>

<style lang="scss">
</style>