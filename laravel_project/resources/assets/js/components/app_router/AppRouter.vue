<template>

    <div class="container-fluid">

        <!-- use router-link component for navigation. -->
        <!-- specify the link by passing the `to` prop. -->
        <!-- `<router-link>` will be rendered as an `<a>` tag by default -->
        <router-link to="/foo">Go to Foo</router-link>
        <router-link to="/bar">Go to Bar</router-link>
        <router-link to="/user/test">Go to user/test</router-link>
        <router-link to="/user/best">Go to user/best</router-link>

        <router-view></router-view>

    </div>

</template>

<script>

import { mapGetters, mapActions } from 'vuex'


export default {

    computed: {
        ...mapGetters({
            currentTestState: 'currentTestState'
        })
    },
    methods: {
        ...mapActions([
            'toggleTestState'
        ]),
    },
    created () {
        //this.$store.dispatch('currentTestState')        
    }

}

</script>


<style lang="scss" scoped>

</style>
