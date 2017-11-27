<template>
    <div >
        <button v-on:click="shuffle">Shuffle</button>
        <transition-group name="flip-list" tag="ul">
            <li v-for="item in items" v-bind:key="item">
                {{ item }}
            </li>
        </transition-group>
    </div>
</template>


<script>

function shuffle(array) {
    let counter = array.length;

    // While there are elements in the array
    while (counter > 0) {
        // Pick a random index
        let index = Math.floor(Math.random() * counter);

        // Decrease counter by 1
        counter--;

        // And swap the last element with it
        let temp = array[counter];
        array[counter] = array[index];
        array[index] = temp;
    }
    return array;
}

export default {

    data() {
        return {
            items: [1,2,3,4,5,6,7,8,9,10]
        }
    },
    methods: {
        shuffle: function () {
            let temp = shuffle(this.items)
            this.$set(this.items, temp);
        }
    }
}

</script>


<style lang="scss">
.flip-list-move {
  transition: transform 1s;
}
</style>