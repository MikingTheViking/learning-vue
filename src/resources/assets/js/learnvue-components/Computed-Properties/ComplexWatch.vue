<template>

    <div>
        <p>This example uses a generic API call to the server to return the, given format = {{ dateformat }}, time = {{ time }}</p>
        <input v-model="dateformat">
    </div>
    
</template>

<script>

    export default {

        data() {

            return {

                title: 'Computed Property Sample',
                message: 'This is my sample message',
                time: '',
                dateformat: "l jS \of F Y h:i:s A"

            };
        },
        watch: {
            dateformat: function (newformat) {
                this.dateformat = newformat;
                this.getTime();
            }
        },
        methods: {
            getTime: function() {
                
                console.log('time is initially : ' + this.time);

                let vm = this;

                axios.get('testapi')
                .then(function (response) {
                    console.log(response.data);
                    vm.time = response.data;
                })
                .catch(function (error) {
                    alert('Error! Could not reach the API. ' + error);
                })

            }
        }
    }

</script>

<style lang="scss">

</style>