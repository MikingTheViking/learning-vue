<template>

    <div class="login">
    
        <h1>{{message}}</h1>
        <button v-on:click="reverseMessage">Reverse Message</button>
        <p>fontawesomeicon: "<font-awesome icon="user" />" </p>
    </div>

</template>

<script>

    import FontAwesome from '@fortawesome/vue-fontawesome';

    export default {

        components: {
            FontAwesome
        },
        created() {
            console.log('login instance created');
        },
        data() {
            return {
                message: 'Holla holla!'
            };
        },
        methods: {
            reverseMessage: function () {
                console.log('reverseMessage!');
                this.message = this.message.split('').reverse().join('')
            }
        }
    }

</script>

<style lang="scss">

    .login {
        background: green;
    }

</style>