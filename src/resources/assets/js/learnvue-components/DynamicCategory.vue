<template>
    <div class="container-fluid" v-html="content">
    </div>
    

</template>

<script>

import { mapGetters, mapActions } from 'vuex'

export default {
    computed: {
        ...mapGetters({
            content: 'getContent'
        }),
        currentRoute: function () {
            return this.$route;
        }
    },
    methods: {
        ...mapActions([
            'setContent'
        ]),
        loadContent: function () {
            let vm = this;

            // Optionally the request above could also be done as
            let url = '/learnvue/app/api/' + (vm.$route.params.route ? vm.$route.params.route : '');
            console.log('requesting: ' + url);
            axios.get(url,
            {
                responseType: 'text'
            })
            .then(function (response) {
                console.log('GOT A RESPONSE');
                //console.log(response);
                vm.setContent(response.data);
            })
            .catch(function (error) {
                console.error(error);
            });
        }
    },
    watch: {
        currentRoute: function (newRoute) {
            console.log('route updated');
            this.loadContent();
        }
    },
    created() {
        console.log('DynamicCategory created, loading content based on route');
        console.log('currentRoute = ' + this.currentRoute);
        this.loadContent();
    }

}
    
    
</script>

<style lang="scss" scoped>

</style>
