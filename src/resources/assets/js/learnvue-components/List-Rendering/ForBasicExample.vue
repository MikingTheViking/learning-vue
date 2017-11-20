<template>

    <div>
        <p>The following list is being rendered using <code>v-for</code>.</p>
        <ul>
            <li v-for="item in items">
                {{ item.message }}
            </li>
        </ul>
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'For Directive Basic Sample',
                items: [
                    {message: 'first'},
                    {message: 'second'},
                    {message: 'third'},
                    {message: 'fourth'},
                    {message: 'fifth'}
                ]
            };
        }
    }

</script>

<style lang="scss">
</style>