<template>

<div>
    <button @click="show = !show">
    Toggle render
  </button>
  <transition
    name="custom-classes-transition"
    enter-active-class="animated tada"
    leave-active-class="animated bounceOutRight"
  >
    <p v-if="show">hello</p>
  </transition>
</div>

</template>

<script>


    export default {

        data() {
            return {
                show:true
            };
        }

    }
</script>
