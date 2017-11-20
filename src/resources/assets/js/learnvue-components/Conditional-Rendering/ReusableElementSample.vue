<template>
    <div v-if="loginType === 'username'">
        <label>Username</label>
        <input placeholder="Enter your username">
        <button v-on:click="toggleLoginType('other')">Change Login Type to other from {{ loginType }}</button>
    </div>
    <div v-else>
        <label>Email</label>
        <input placeholder="Enter your email address">
        <button v-on:click="toggleLoginType('username')">Change Login Type to username from {{ loginType }}</button>
    </div>
</template>

<script>

    export default {

        data() {

            return {
                title: 'Reusable Element Sample',
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