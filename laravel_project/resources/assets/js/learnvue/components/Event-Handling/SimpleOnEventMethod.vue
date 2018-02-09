<template>
    <div>
        <button v-on:click="greet">Greet</button>
    </div>
</template>

<script>

export default {

    data() {
        return {
            name: 'Vue.js'
        }
    },
    methods: {
        greet: function (event) {
            alert('Hello ' + this.name + '!')

            if (event) {
                alert(event.target.tagName);
            }
        }
    }

}

</script>