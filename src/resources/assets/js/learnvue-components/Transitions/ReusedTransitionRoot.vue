<template>

    <div>
        <div class="col-sm-6">
            <p>Select the component to show:</p>
            <input type="radio" id="Basic" value="Basic" v-model="active">
            <label for="Basic">Basic</label>
            <br>
            <input type="radio" id="Counter" value="Counter" v-model="active">
            <label for="Counter">Counter</label>
            <br>
            <input type="radio" id="None" value="none" v-model="active">
            <label for="none">Nothing</label>
            <p>Active is: {{ active }}</p>
        </div>
        <reusable />
            <basic-instance v-if="active === 'Basic'" />
            <counter-instance v-else-if="active === 'Counter'" />
            <p v-else-if="active === 'Nothing'">Something provided by the root component.</p>
        </reusable>
    </div>


</template>

<script>

import ReusableTransition from './ReusableTransitionUsingTemplateComponent.vue';
import BasicInstance from '../BasicInstance.vue';
import Counter from '../Counter.vue';

export default {

    data() {
        return {
            targets: ['Basic', 'Counter'],
            active: 'Basic'
        }
    },
    components: {
        'reusable': ReusableTransition,
        'basic-instance': BasicInstance,
        'counter-instance': Counter
    }

}

</script>