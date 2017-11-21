<template>
    <div>
        <button v-on:click="say('hi')">Say hi</button>
        <button v-on:click="say('what')">Say what</button>
    </div>
</template>

<script>

export default {

    methods: {
        say: function (message) {
            alert(message)
        }
    }

}

</script>