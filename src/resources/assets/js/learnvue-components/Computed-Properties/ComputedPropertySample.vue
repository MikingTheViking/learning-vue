<template>

    <div>
        <p>Modifiers are special postfixes denoted by a dot which indicate that a directive should be bound in a special way: such as using <code>.prevent</code> to instruct the directive to call <code>event.preventDefault()</code> on the triggered event</p>
        <p>This example sets a computed property <code>reversedMessage</code> which returns the <code>message</code> property after reversing its contents.</p>
        <p>Original message: "{{ message }}"</p>
        <p>Computed reversed message: "{{ reversedMessage }}"</p>
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'Computed Property Sample',
                message: 'This is my sample message'
            };
        },
        computed: {
            //a computed getter
            reversedMessage: function() {
                //`this` points to the vm instance
                return this.message.split(' ').reverse().join(' ')
            }
        }
    }

</script>

<style lang="scss">

</style>