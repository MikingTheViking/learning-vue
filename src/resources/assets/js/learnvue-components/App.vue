<template>
    <div id="app-root">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2" id="app-content-nav">
                    <p>Root router path: {{ $route.fullPath }}</p>
                    <ul>
                        <li><router-link to="/learnvue/foo">/foo</router-link></li>
                        <li><router-link to="/learnvue/bar">/bar</router-link></li>
                    </ul>
                </div>
                <div class="col-10" id="app-content">
                    <router-view></router-view>
                </div>
            </div>
    </div>

    </div>
    
</template>


<script>

export default {

}
</script>

<style lang="scss" scoped>

</style>