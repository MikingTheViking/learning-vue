<section name="Custom Directives">
    <h3><a href="https://vuejs.org/v2/guide/custom-directive.html">Custom Directives</a></h3>

    <h4>Intro</h4>

    <p>In additiona to the default directives shipped in core (<code>v-model</code> and <code>v-show</code>), Vue also allows for custom directives to be registered. In Vue 2.0, the primary form of code reuse and abstraction is components - however there may still be cases where low-level DOM access is required: this is where custom directives are useful.</p>

    <p>An example would be focusing on an input element on page load:</p>

    <div class="row">
        <div class="col-sm-6">
            <h5>Global Registration</h5>
            <pre>// Register a global custom directive called `v-focus`
Vue.directive('focus', {
  // When the bound element is inserted into the DOM...
  inserted: function (el) {
    // Focus the element
    el.focus()
  }
})</pre>

        </div>
        <div class="col-sm-6">
            <h5>Local Registration</h5>
            <pre>...,
directives: {
  focus: {
    // directive definition
    inserted: function (el) {
      el.focus()
    }
  }
}</pre>
        </div>
    </div>

    <p>In the template use the new <code>v-focus</code> attribute on any element, such as the component below. On page load that component will have focus.</p>

    <div>
        <custom-directive class="vue-component-root row"/>
    </div>


    <h3><a href="https://vuejs.org/v2/guide/custom-directive.html#Hook-Functions">Hook Functions</a></h3>

    <p>A directive definition object can provide several optional hook functions:</p>

    <dl>
        <dt><code>bind</code></dt>
        <dd>Called only once, when the directive is first bound to the element.This is where one-time setup work is performed.</dd>
        <dt><code>inserted</code></dt>
        <dd>Called when the bound element has been inserted into its parent node (only guarantees the parent node presence, not necessariuly in-document)</dd>
        <dt><code>update</code></dt>
        <dd>Called after the containing component's VNode has updated, <strong>but possibly before its children have updated</strong>. The directive's value may or may not have changed, but you can skip unnecessary updates by comparing the binding's current and old values.</dd>
        <dt><code>componentUpdated</code></dt>
        <dd>Called after the containing component's VNode <strong>and the VNodes of its children</strong> have updated.</dd>
        <dt><code>unbind</code></dt>
        <dd>Called only once, when the directive is unbound from the element.</dd>
    </dl>

    <p>The arguments passed into these hooks (<code>el</code>, <code>binding</code>, <code>vnode</code>, <code>oldVnode</code>) will be covered in the next section.</p>

    <h3><a href="https://vuejs.org/v2/guide/custom-directive.html#Directive-Hook-Arguments">Directive Hook Arguments</a></h3>

    <p>Directive hooks are passed these arguments:</p>

    <ul>
        <li><code>el</code>: The element the directive is bound to. This can be used to directly manipulate the DOM.</li>
        <li><code>binding</code>: An object containing the following properties:
            <ul>
                <li><code>name</code>: The name of the directive (without the <code>v-</code> prefix)</li>
                <li><code>value</code>: The value passed to the directive. For example in <code>v-my-directive="1 + 1"</code>, the value would be <code>2</code>.</li>
                <li><code>oldValue</code>: The previous value, only available in <code>update</code> and <code>componentUpdated</code>. It is available whether or not the value has changed.</li>
                <li><code>expression</code>: The expression of the binding as a string. For example in <code>v-my-directive="1 + 1"</code>, the expression would be <code>"1 + 1"</code>.</li>
                <li><code>arg</code>: The argument passed to the directive , if any. For example in <code>v-my-directive:foo</code>, the arg would be <code>"foo"</code>.</li>
                <li><code>modifiers</code>: An object containing modifiers, if any. For example in <code>v-my-directive.foo.bar</code>, the modifiers object would be <code>{ foo: true, bar: true}</code></li>
            </ul>
        </li>
        <li><code>vnode</code>: The virtual node produced by Vue's compiler.</li>
        <li><code>oldValue</code>: The previous virtual node, only available in the <code>update</code> and <code>componentUpdated</code> hooks.</li>
    </ul>

    <div class="alert alert-danger">
        <p>Other than <code>el</code>, these arguments should be treated as read-only and never modify them. To share information across hooks, it is recommended to do so through the element's dataset.</p>
    </div>

    <p>An example of a custom directive using some of these properties:</p>

    <pre>&lt;div id="hook-arguments-example" v-demo:foo.a.b="message" /&gt;</pre>

    <pre>Vue.directive('demo', {
  bind: function (el, binding, vnode) {
    var s = JSON.stringify
    el.innerHTML =
      'name: '       + s(binding.name) + '&lt;br&gt;' +
      'value: '      + s(binding.value) + '&lt;br&gt;' +
      'expression: ' + s(binding.expression) + '&lt;br&gt;' +
      'argument: '   + s(binding.arg) + '&lt;br&gt;' +
      'modifiers: '  + s(binding.modifiers) + '&lt;br&gt;' +
      'vnode keys: ' + Object.keys(vnode).join(', ')
  }
})
new Vue({
  el: '#hook-arguments-example',
  data: {
    message: 'hello!'
  }
})</pre>

    <div>
        <directive-hook-arguments class="vue-component-root row" />
    </div>

    <h3><a href="https://vuejs.org/v2/guide/custom-directive.html#Function-Shorthand">Function Shorthand</a></h3>

    <p>In many cases it may be desirable to have the same behaviour on <code>bind</code> and <code>update</code> while disregarding the other hooks:</p>

    <pre>Vue.directive('color-swatch', function (el, binding) {
  el.style.backgroundColor = binding.value
})</pre>

    <h3><a href="https://vuejs.org/v2/guide/custom-directive.html#Object-Literals">Object Literals</a></h3>

    <p>If a directive needs multiple values, a JavaScript object literal can also be passed in. <strong>Remember, directives can take any valid JavaScript expression.</strong></p>

    <pre>&lt;div v-demo="{ color: 'white', text: 'hello!' }"&gt;&lt;/div&gt;</pre>

    <pre>Vue.directive('demo', function (el, binding) {
  console.log(binding.value.color) // => "white"
  console.log(binding.value.text)  // => "hello!"
})
</pre>






</section>