<template>

    <p>App Router</p>

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
