<template>

    <div>
        <div id="hook-arguments-example" v-demo:foo.a.b.c.d="message" />
    </div>

</template>

<script>

export default {

    data() {
        return {
            message: 'hello!'
        }
    },
    directives: {
        demo: {
            inserted: function (el, binding, vnode) {
                var s = JSON.stringify
                el.innerHTML =
                'name: '       + s(binding.name) + '<br>' +
                'value: '      + s(binding.value) + '<br>' +
                'expression: ' + s(binding.expression) + '<br>' +
                'argument: '   + s(binding.arg) + '<br>' +
                'modifiers: '  + s(binding.modifiers) + '<br>' +
                'vnode keys: ' + Object.keys(vnode).join(', ')
            }
        }
    }


}

</script>