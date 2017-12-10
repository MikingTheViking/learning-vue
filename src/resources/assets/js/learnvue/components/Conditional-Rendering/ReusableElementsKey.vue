<template>
    <div v-if="loginType === 'username'">
        <label>Username</label>
        <input placeholder="Enter your username" key="username-input">
        <button v-on:click="toggleLoginType('other')">Change Login Type to other from {{ loginType }}</button>
    </div>
    <div v-else>
        <label>Email</label>
        <input placeholder="Enter your email address" key="email-input">
        <button v-on:click="toggleLoginType('username')">Change Login Type to username from {{ loginType }}</button>
    </div>
</template>

<script>

    export default {

        data() {

            return {
                title: 'Reusable Element with Key Sample',
                loginType: 'username'
            };
        },
        methods: {
            toggleLoginType: function (newVal) {
                this.loginType = newVal;
            }
        }
    }

</script>

<style lang="scss">
</style>