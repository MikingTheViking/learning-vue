<template>

    <div id="animated-number-demo">
        <input v-model.number="number" type="number" step="20">
        <p>{{ animatedNumber }}</p>
    </div>

</template>

<script>

var TWEEN = require('@tweenjs/tween.js');

export default {

    data() {

        return {
            number: 0,
            animatedNumber: 0
        };

    },
    watch: {
        number: function(newValue, oldValue) {
            var vm = this
            function animate () {
                if (TWEEN.update()) {
                    requestAnimationFrame(animate)
                }
            }
            new TWEEN.Tween({ tweeningNumber: oldValue })
                .easing(TWEEN.Easing.Quadratic.Out)
                .to({ tweeningNumber: newValue }, 500)
                .onUpdate(function () {
                    vm.animatedNumber = this._object.tweeningNumber.toFixed(0)
                })
                .start()
            animate()
        }
    }

}

</script>