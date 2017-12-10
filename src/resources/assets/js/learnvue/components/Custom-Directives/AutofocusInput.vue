<template>

    <div>
        <input v-focus>
    </div>

</template>

<script>

export default {

    data() {
        return {};
    },
    directives: {
        focus: {
            // directive definition
            inserted: function (el) {
                el.focus()
            }
        }
    }
}

</script>