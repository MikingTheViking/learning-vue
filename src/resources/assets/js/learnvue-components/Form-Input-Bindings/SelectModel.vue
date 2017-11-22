<template>
    <div>
        <div class="col-sm-6">
            <div class="row">
                <select v-model="selected">
                    <option disabled value="">Please select one</option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                </select>
            </div>
            <span>Selected: {{ selected }}</span>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <select v-model="selectedmulti" multiple>
                    <option disabled value="">Please select one or more</option>
                    <option>A</option>
                    <option>B</option>
                    <option>C</option>
                </select>
            </div>
            <span>Selected: {{ selectedmulti }}</span>
        </div>
        <div class="col-sm-8">
            <p>Dynamic options rendered with <code>v-for</code>.</p>
            <select v-model="selecteddynamic">
                <option v-for="option in options" v-bind:value="option.value">
                    {{ option.text }}
                </option>
            </select>
            <span>Selected: {{ selecteddynamic }}</span>

        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selected: '',
            selectedmulti: [],
            selecteddynamic: '',
            options: [
                {text: 'One', value: 'A'},
                {text: 'Two', value: 'B'},
                {text: 'Three', value: 'C'},
            ]
        };
    }
}
</script>