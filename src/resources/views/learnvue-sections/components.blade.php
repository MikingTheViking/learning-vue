<section name="Components">
    <h2><a href="https://vuejs.org/v2/guide/components.html">Components</a></h2>

    <p>Components are one of the most powerful features of Vue allowing the developer to extend basic HTML elements to encapsulte reusable code. Components are high level custom elements that Vue's compiler attaches behaviour to. Although components can also appear as native HTML elements extended using the special <code>is</code> attribute.</p>

    <h3><a href="https://vuejs.org/v2/guide/components.html#Using-Components">Using Components</a></h3>

    <p>Components need to be registered before they can be used. A component can be either registered <strong>globally</strong> or <strong>locally</strong>.</p>

    <h4><a href="https://vuejs.org/v2/guide/components.html#Global-Registration">Global Registration</a></h4>

    <p>A global component can be registered in the root script (that initializes the Vue instance) by calling: <code>Vue.component(tagName, options)</code>.</p>

    <pre>Vue.component('my-component', {
    // options
});
Vue.component('lazy-modifier', require('./learnvue-components/Form-Input-Bindings/LazyModifier.vue'));</pre>

    <p>Once registered, a component can be used in an instance's template as a custom element <code>&lt;my-component /&gt;</code> within the Vue instance template. Components have been used for this whole demo, so check any of them out!</p>

    <h4><a href="https://vuejs.org/v2/guide/components.html#Local-Registration">Local Registration</a></h4>

    <p>A local component is available within a limited scope or another Vue instance/component by registering it with the <code>components</code> instance option.</p>
<pre>....
components: {
    'my-component': ChildComponent   
}</pre>

    <h4><a href="https://vuejs.org/v2/guide/components.html#DOM-Template-Parsing-Caveats">DOM Template Parsing Caveats</a></h4>

    <p>When using the DOM as the template (e.g. using the <code>el</code> option to mount an element with existing content) inherent HTML restrictions are applied. Vue can only retrieve the template content <strong>after</strong> the browser has parsed and normalized it. For some elements (<code>&lt;ul&gt;</code>, <code>&lt;ol&gt;</code>, <code>&lt;table&gt;</code>, <code>&lt;select&gt;</code>) there are restrictions applied to what elements can appear inside them (such as <code>&lt;li&gt;</code>, <code>&lt;options&gt;</code>, or table elements such as <code>&lt;tr&gt;</code></p>

    <p>In this case, to place custom elements in these restricted nodes use the <code>is</code> special attribute.</p>
    <p><strong>NO WORKY</strong></p>
    <pre>&lt;table&gt;
    &lt;my-row&gt;....&lt;/my-row&gt;
&lt;/table&gt;</pre>

    <p><strong>WORKY</strong></p>
    <pre>&lt;table&gt;
    &lt;tr is="my-row"&gt;&lt;/tr&gt;
&lt;/table&gt;</pre>


</section>