<section name="Mixins">
    <h3><a href="https://vuejs.org/v2/guide/mixins.html">Mixins</a></h3>

    <h4><a href="https://vuejs.org/v2/guide/mixins.html#Basics">Basics</a></h4>

    <p>Mixins are a flexible way to distribute functionalities for Vue components. A mixin can contain any component options. When a component uses a mixin, all options in the mixin will be "mixes" into the component's own options.</p>

    <pre>//define a mixin object
var myMixin= {
    created: function () {
        this.hello();
    },
    methods: {
        hello: function () {
            console.log('Hello from mixin');
        }
    }
}

//define a component that uses the mixin
var Component = Vue.extend({
    mixins: [myMixin]
});

var component = new Component();    //outputs "Hello from mixin"
</pre>

    <h4><a href="https://vuejs.org/v2/guide/mixins.html#Option-Merging">Option Merging</a></h4>

    <p>When a mixin and a component both contain overlapping options they will be "merged" using appropriate strategies. For instance, hook functions with the same name are merttged into an array so that all of them will be called.</p>

    <div class="alert alert-info">
        <p>Mixin hooks will be called <strong>before</strong> the component's own hooks.</p>
    </div>

    <pre>var mixin = {
  created: function () {
    console.log('mixin hook called')
  }
}
new Vue({
  mixins: [mixin],
  created: function () {
    console.log('component hook called')
  }
})
// => "mixin hook called"
// => "component hook called"</pre>

    <p>Options that rexpect object values (such as <code>methods</code>, <code>components</code>, <code>directives</code>) will be merged into the sdame object. The component's options will take priority over the mixin when there are conflicting keys.</p>

    <pre>var mixin = {
  methods: {
    foo: function () {
      console.log('foo')
    },
    conflicting: function () {
      console.log('from mixin')
    }
  }
}
var vm = new Vue({
  mixins: [mixin],
  methods: {
    bar: function () {
      console.log('bar')
    },
    conflicting: function () {
      console.log('from self')
    }
  }
})
vm.foo() // => "foo"
vm.bar() // => "bar"
vm.conflicting() // => "from self"</pre>

    <div class="alert alert-info">
        <p>Note that the same merge strategies are used in <code>Vue.extend()</code>.</p>
    </div>

    <h3><a href="https://vuejs.org/v2/guide/mixins.html#Global-Mixin">Global Mixin</a></h3>

    <p>A mixin can be applied globally, however <strong>use with caution</strong>. Once a mixin is applied globally it will affect <strong>every</strong> Vue instance created afterwards. When used properly it can be used to inject processing logic for custom options:</p>

    <pre>// inject a handler for `myOption` custom option
Vue.mixin({
  created: function () {
    var myOption = this.$options.myOption
    if (myOption) {
      console.log(myOption)
    }
  }
})
new Vue({
  myOption: 'hello!'
})
// => "hello!"</pre>

    <div class="alert alert-danger">
        <p>Global mixins affect <strong>every</strong> Vue component, even third party components. It's a good idea to ship global mixins as plugins to avoid duplicate applications.</p>
    </div>

    <h3><a href="https://vuejs.org/v2/guide/mixins.html#Custom-Option-Merge-Strategies">Custom Option Merge Strategies</a></h3>

    <p>When custom options are merged they use the default merging strategy which overwrites the existing value. To merge a custom option using custom logic, attach the function <code>Vue.config.optionMergeStrategies</code>:</p>

    <pre>Vue.config.optionMergeStrategies.myOption = function (toVal, fromVal) {
  // return mergedVal
}</pre>

    <p>Most object-based options can be merged using the same strategy used by <code>methods</code>:</p>

    <pre>var strategies = Vue.config.optionMergeStrategies
strategies.myOption = strategies.methods</pre>

    <p>A more advanced example can be found in Vuex's 1.x merging strategy:</p>

    <pre>const merge = Vue.config.optionMergeStrategies.computed
Vue.config.optionMergeStrategies.vuex = function (toVal, fromVal) {
  if (!toVal) return fromVal
  if (!fromVal) return toVal
  return {
    getters: merge(toVal.getters, fromVal.getters),
    state: merge(toVal.state, fromVal.state),
    actions: merge(toVal.actions, fromVal.actions)
  }
}</pre>




</section>