<template>
  <div class="some-app">
    <button @click="testToggle">Toggle test boolean from {{ test }} to {{ !test }}</button>
  </div>
</template>

<script>

import { mapGetters } from 'vuex';


export default {
  name: 'App',
  computed: {
    ...mapGetters ({
      test: 'currentTestState'
    }),
    testVal () {
      return this.test;
    }
  },
  watch: {
    'test': function () {
      console.log('watch triggered for test change!');
    }
  },
  methods: {
    testToggle () {
      console.log('running testToggle from the component, this.test = ' + this.test);
      this.$store.dispatch('testToggle', {
        test: !this.test
      }, {root: true});
    }
  }
}
</script>