<template>
    <div>
        <select v-model="selected">
            <!-- inline object literal -->
            <option v-bind:value="{ number: null }" disabled>Please select an option</option>
            <option v-bind:value="{ number: 123 }">123</option>
            <option v-bind:value="{ number: 456 }">456</option>
            <option v-bind:value="{ number: 789 }">789</option>
        </select>
        <p>Presently selected number: {{ selected.number }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selected: {
                number: null
            }
        };
    },
    watch: {
        selected: function () {
            console.log('selected changed ', this.selected, this.selected.number);
        }
    }
}
</script>