<template>

    <div>
        <div class="col-sm-6">
            <p>This is the lazy input, the data will only get synced after the <code>change</code> event.</p>
            <!-- synced after "change" instead of "input" -->
            <input v-model.lazy="lazymessage" placeholder="LAZY">
            <p>The lazy value is: {{ lazymessage }}</p>
        </div>
        <div class="col-sm-6">
            <p>This is a normally bound input, the data will get synced after each input event (immediate).</p>
            <input v-model="message" placeholder="NOT LAZY">
            <p>The not-lazy value is: {{ message }}</p>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            lazymessage: '',
            message: ''
        }
    }
}
</script>