<template>

    <div class="container-fluid">

        <h1>LearnVue Router App</h1>
        <p>Root router path: {{ $route.fullPath }}</p>
        <ul>
            <li><router-link to="/nested-router">/nested-router</router-link></li>
            <li><router-link to="/foo">/foo</router-link></li>
            <li><router-link to="/bar">/bar</router-link></li>
        </ul>
        <router-view></router-view>
    </div>

</template>


<script>

export default {

}
</script>

<style lang="scss" scoped>

</style>