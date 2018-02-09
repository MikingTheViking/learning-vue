<section name="Render Functions &amp; JSX">
    <h3><a href="https://vuejs.org/v2/guide/render-function.html">Render Functions &amp; JSX</a></h3>

    <h4><a href="https://vuejs.org/v2/guide/render-function.html#Basics">Basics</a></h4>

    <p>Vue usually recommends using templates to build HTML. There are situations where the full programmatic power of JavaScript is needed. This is where you'd use a <strong>render function</strong>, a closer-to-compiler alternative to templates.</p>

    <pre>Vue.component('anchored-heading', {
  render: function (createElement) {
    return createElement(
      'h' + this.level,   // tag name
      this.$slots.default // array of children
    )
  },
  props: {
    level: {
      type: Number,
      required: true
    }
  }
})</pre>

    <p>TODO: moving to Vuex instead for now!</p>


</section>