<template>

    <div class="login">
    
        <h1>{{message}}</h1>
        <button v-on:click="reverseMessage">Reverse Message</button>
    </div>

</template>

<script>

    export default {

        data() {

            return {
                data: {
                    message: 'Holla holla!'
                },
                methods: {
                    reverseMessage: function () {
                        console.log('reverseMessage!');
                        this.message = this.message.split('').reverse().join('')
                    }
                }
            };
        }

    }

</script>

<style lang="scss">

    .login {
        background: green;
    }

</style>