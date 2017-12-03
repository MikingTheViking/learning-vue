<template>
    <div class="container-fluid">
        <p>Dynamic Category Component {{$route.params.route}}</p>
        <div class="row" v-show="content" v-html="content">
        </div>
    </div>
    

</template>

<script>

    export default {
        data() {
            return {
                content: ''
            }
        },
        created() {
            console.log('fuck a DynamicCategory was created. Time to fetch the content via the api', this.$router, this.$route, this, this.$route.params.route);
            console.log('--------');
            this.loadContent(this)
        },
        methods: {
            loadContent: function() {
                console.log('loading Content');
                let vm = this;

                //console.log('loadingContent on ');
                //console.log(this.$route.params.route + ' initially: ' + this.content);
                
                // Optionally the request above could also be done as
                let url = '/learnvue/app/api/' + (this.$route.params.route ? this.$route.params.route : '');
                console.log('requesting: ' + url);
                axios.get(url,
                {
                    responseType: 'text'
                })
                .then(function (response) {
                    console.log('GOT A RESPONSE');
                    console.log(response);
                    vm.content = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
                /*

                let vm = this;

                axios.get('testapi')
                .then(function (response) {
                    console.log(response.data);
                    vm.time = response.data;
                })
                .catch(function (error) {
                    alert('Error! Could not reach the API. ' + error);
                })
                */
            }
        }

    }
</script>

<style lang="scss" scoped>

</style>
