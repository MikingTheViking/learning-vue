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

    <p><strong>NOTE:</strong> these limitations do not apply if using string templates from the following sources:</p>

    <ul>
        <li><code>&lt;script type="text/x-template"&gt;</code></li>
        <li>JavaScript Inline template strings</li>
        <li><code>.vue</code> components</li>
    </ul>

    <p>Therefore it is preferred to use string templates whenever possible.</p>


    <h4><a href="https://vuejs.org/v2/guide/components.html#data-Must-Be-a-Function"><code>data</code> Must Be a Function</a></h4>

    <p>Most options that can be passed into the Vue constructor can be used in a component, with one special case: <code>data</code> must be a function. In fact Vue will halt if this is not the case.</p>

    <h4><a href="https://vuejs.org/v2/guide/components.html#Composing-Components">Composing Components</a></h4>

    <p>Components are meant to be used together in a parent-child relationship: component A may use component B in its own template. Components should be written and reasoned in relative isolation to accomodate testing, maintenance and reuse. Parent components pass data to child components, and child coponents pass events up to the parent.</p>

    <div class="d-flex flex-column">
    	<p class="lead">Props Down, Events Up</p>
        <p>The parent passes data down to the child via <strong>props</strong>, and the child sends messages to the parent via <strong>events</strong>.</p>
	     <figure class="figure">
                <img src="/images/vue-props-events.png" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                <figcaption class="figure-caption">Props Down, Events Up</figcaption>
            </figure>
    </div>

    <h3><a href="https://vuejs.org/v2/guide/components.html#Props">Props</a></h3>

    <p>Data is passed to a component via <strong>props</strong>.</p>

    <h4><a href="https://vuejs.org/v2/guide/components.html#Passing-Data-with-Props">Passing Data with Props</a></h4>

    <p>Each component instance has its own <strong>isolated scope</strong>; you cannot and should not directly reference parent data in a child component's template.The parent's data can be passed down to child components using <strong>props</strong>. A prop is a custom attribute for passing information, the child component needs to explicitly declare the props it expects to receive using the <code>props</code> option.</p>

    <pre>....
props: [
    'prop1'
]</pre>

    <p>Data can now be passed via attributes of the custom component.</p>

<pre>&lt;child-component prop1="some data being passed" /&gt;</pre>

    <div id="vue-prop-simple">
        <prop-simple class="vue-component-root row" message="This is the message passed via the custom component's props." />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/components.html#camelCase-vs-kebab-case">camelCase vs. kebab-case</a></h4>

    <p>HTML attributes are case-insensitive, so when using non-string templates camelCased prop names need to use their kebab-case equivalents.</p>

    <pre>....,
template: '&lt;span&gt;{<span stlye="width:0px"></span>{ myMessage }}&lt;/span&gt;',
props: ['myMessage']</pre>
    <pre>&lt;child my-message="hello!" /&gt;</pre>

    <h4><a href="https://vuejs.org/v2/guide/components.html#Dynamic-Props"></a></h4>

    <p><code>v-bind</code> can also be used to dynamically bind props to data on the parent. Whenever the data is updated in the parent it will also flow down to the child.</p>

    <pre>&lt;div&gt;
    &lt;input v-model="parentMsg"&gt;
    &lt;br /&gt;
    &lt;child v-bind:my-message="parentMsg" /&gt;
    &lt;child :my-message="parentMsg" /&gt;
&lt;/div&gt;</pre>

    <div id="vue-dynamic-props">
        <dynamic-props class="vue-component-root row" />
    </div>

    <p>To pass all the properties in an object as props, use <code>V-bind</code> without an argument.</p>
    <pre>todo: {
    text: 'Learn Vue',
    isComplete: false
}</pre>

<pre>&lt;todo-item v-bind="todo" /&gt;</pre>

    <p>Is equivalent to:</p>

<pre>&lt;todo-item
    v-bind:text="todo.text"
    v-bind:is-complete="todo.isComplete"
/&lt;</pre>

    <h4><a href="https://vuejs.org/v2/guide/components.html#Literal-vs-Dynamic">Literal vs. Dynamic</a></h4>

    <p>Passed down props are literal props, their value is a plain string (such as "1"): <code>&lt;comp some-prop="1" /&gt;</code></p>
    <p>In order to pass down another type (such as a number), use <code>v-bind</code> so that its value is evaluated as a JavaScript expression: <code>&lt;comp v-bind:some-prop="1" /&gt;</code></p>

    <h4><a href="https://vuejs.org/v2/guide/components.html#One-Way-Data-Flow">One-Way Data Flow</a></h4>

    <p>All props form a <strong>one-way-down</strong> binding betwee the child property and the parent: when the parent property is updated, it will flow down to the child. This prevents child components from mutating a parent's state keeping the data-flow simple and understandable.</p>

    <p>Every time a parent component is updated, all props in the child component will be refreshed with the latest value. <strong>Do not attempt to mutate a props inside of a child component.</strong></p>

    <p>There are mainly two reasons where mutating a prop seems reasonable:</p>

    <ol>
        <li>The prop is only used to pass in an initial value; the child component is instantiated and uses it as a local data property.</li>
        <li>The prop is passed in as a raw value that needs to be transformed</li>
    </ol>

    <p>The appropriate ways to handle these cases are:</p>

    <ol start="1">
        <li>Define a local data property that is initialized using the prop's value as the initial value.</li>
    </ol>
    <pre>props: ['initialCounter'],
data: function () {
    return {counter: this.initialCounter}
}</pre>

    <ol start="2">
        <li>Define a computed property that is computed from the prop's value</li>
    </ol>
    <pre>props['size'],
computed: {
    normalizedSize: function () {
        return this.size.trim().toLowerCase();
    }
}</pre>

    <p><strong>NOTE:</strong> Object and arrays are passed by reference in JavaScript. This means that if the prop is an array or object in a child component, mutating the object or array in the child component will also affect the parent component's state.</p>

    <h4><a href="https://vuejs.org/v2/guide/components.html#Prop-Validation">Prop Validation</a></h4>

    <p>A component can specify the requirements for the props it is receiving. If a requirement is not met, Vue will emit warnings. <em>This is quite useful when authoring a component that is intended to be used by others.</em></p>

    <p>Instead of defining the props as an array of strings, use an object with validation requirements:</p>

    <pre>Vue.component('example', {
    props: {
        //basic type check ('null' means accept any type)
        propA: Number,
        //multiple possible types
        propB: [String, Number],
        //a required string
        propC: {
            type: String,
            required: true
        },
        //a number with the default value
        propD: {
            type: Number,
            default: 100
        },
        //object/array defaults should bereturned from a factory/function
        propE: {
            type: Object,
            default: function () {
                return {message: 'hello!'};
            }
        },
        //custom validator functionpropF: {
            validator: function (value) {
                return value > 10;
            }
        }
    }
});</pre>

    <p>The <code>type</code> can be one of the following native constructors:</p>

    <ul>
        <li>String</li>
        <li>Number</li>
        <li>Boolean</li>
        <li>Function</li>
        <li>Object</li>
        <li>Array</li>
        <li>Symbol</li>
    </ul>

    <p><code>type</code> can also be a custom constructor function and the assertion will be made with an <code>instanceof</code> check.</p>

    <p>When props validation fails, Vue will produce a console warning (if in development build mode). <strong>Note: </strong> props are validated <strong>before</strong>  a component instance is created, so within <code>default</code> and <code>validator</code> functions, instance properties (<code>data</code>, <code>computed</code>, <code>methods</code>) will not be available.</p>

    <h3><a href="https://vuejs.org/v2/guide/components.html#Non-Prop-Attributes">Non-Prop Attributes</a></h3>

    <p>A non-prop attribute is an attribute that is passed to a component, but does not have a corresponding prop defined.</p>

    <p>Explicitly defined props are preferred for passing information to a child component, however component authors cannot always foresee the contexts in which their components may be used. Hence omponents can accept arbitrary attributes whcich are then added to the component's root element.</p>

    <p>For example, if using a 3rd-party <code>bs-date-input</code> component with a Bootstrap plugin that requires a <code>data-3d-date-picker</code> attribute on the <code>input</code>, add that attribute to the component instance:</p>

    <pre>&lt;bs-date-input data-3d-date-picker="true" /&gt;</pre>

    <p>The <code>data-3d-date-picker="true"</code> attribute will be automatically added to the root element of <code>bs-date-input</code>.</p>

    <h4><a href="https://vuejs.org/v2/guide/components.html#Replacing-Merging-with-Existing-Attributes">Replaceing/Merging with Existing Attributes</a></h4>

    <p>For most attributes, the value provided to the component will replace the value set by the component. <strong>Note: </strong> <code>class</code> and <code>style</code> are smarter and will merge the values from both.</p>

    <p>Ex: Given the template:</p>

    <pre>&lt;input type="date" class="form-control"&gt;</pre>

    <p>Specifying a theme for the date picker may require a specific class:</p>

    <pre>&lt;bs-date-input
    data-3d-date-picker="true"
    class="date-picker-theme-dark" /&gt;</pre>

    <p>In this case, there are two diferent values for <code>class</code>, <code>form-control</code> which is set by the component in its template and <code>date-picker-theme-dark</code> passed to the component by its parent. The resulting class list is merged into: <code>form-control date-picker-theme-dark</code>.</p>

    <h3><a href="https://vuejs.org/v2/guide/components.html#Custom-Events">Custom Events</a></h3>

    <p>Data is passed down from parent to child components using props. Communicating from the child back to the parent component requires Vue's custom event system.</p>

    <h4><a>Using <code>v-on</code> with Custom Events</a></h4>

    <p>Every Vue instance implements an <strong>events interface</strong> allowing it to:</p>

    <ul>
        <li>Listen to an event using <code>$on(eventName)</code></li>
        <li>Trigger an event using <code>$emit(eventName)</code></li>
    </ul>

    <p><strong>Note:</strong> Vue's event system is different from the browser's EventTarget API, although similar in functionality <code>$on</code> and <code>$emit</code> are not aliases for <code>addEventListener</code> and <code>dispatchEvent</code>.</p>

    <p>A parent component can listen to the event emitted from a child component using <code>v-on</code> directly in the template where the child component is used.</p>

    <p><strong>Note:</strong> <code>$on</code> cannot be used to listen to event emitted by children, for this use <code>v-on</code> directly in the template:</p>


    <div id="vue-event-handling">
        <event-handling class="vue-component-root row" />
    </div>


    <h4><a href="https://vuejs.org/v2/guide/components.html#Binding-Native-Events-to-Components">Binding Native Events to Components</a></h4>

    <p>When listening for a native event on the root elemtn of a component use the <code>.native</code> modifier for <code>v-on</code>:</p>

    <pre>&lt;my-component v-on:click.native="doTheThing" /&gt;</pre>

    <h4><a href="https://vuejs.org/v2/guide/components.html#sync-Modifier"><code>.sync</code> Modifier</a></h4>

    <p>Some scenarios require "two-way binding" for a prop, this is achieved using <code>.sync</code>. When a child component mutates a prop that has <code>.sync</code> the value change will be reflected in the parent. <code>.sync</code> is syntax sugar that automaticall expands into an additional <code>v-on</code> listener.</p>

    <pre>&lt;comp :foo.sync="bar" /&gt;</pre>

    <p>is expanded by Vue into:</p>

    <pre>&lt;comp :foo="bar" @update:foo="val => bar = val" /&gt;</pre>

    <p>For the child component to update <code>foo</code>'s value it needs to explicitly emit an event instead of mutating the prop:</p>

    <pre>this.$emit('update:foo', newValue)</pre>

    <h4><a href="https://vuejs.org/v2/guide/components.html#sync-Modifier">Form Input Components using Custom Events</a></h4>

    <p>Custom events can also be used to create custom inputs that work with <code>v-model</code>.</p>

    <pre>&lt;input v-model="something"&gt;</pre>

    <p>is syntactic sugar for:</p>

    <pre>&lt;input
    v-bind:value="something"
    v-on:input="something = $event.target.value"&gt;</pre>

    <p>When used with a component it is simplified to:</p>

    <pre>&lt;custom-input
    :value="something"
    @input="value => { something = value }"&gt;
&lt;/custom-input&gt;</pre>

    <p>For a component to work with <code>v-model</code> it should:</p>

    <ul>
        <li>accept a <code>value</code> prop</li>
        <li>emit an <code>input</code> event with a new value</li>
    </ul>

    <div id="vue-currency-input-parent">
        <currency-input-parent class="vue-component-root row" />
    </div>

    <p>A more complete example is below:</p>

    <div id="vue-currency-input-model-parent">
        <currency-input-model-parent class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/components.html#Customizing-Component-v-model">Customizing Component <code>v-model</code></a></h4>

    <p>The default for <code>v-model</code> on a component uses <code>value</code> as the prop and <code>input</code> as the event, but some input types such as checkboxes and radio buttons may use the <code>value</code> prop for a different purpose. The <code>model</code> option can avoid the conflict:</p>

    <pre>....
model: {
    propr: 'checked',
    event: 'change'
},
props: {
    checked: Boolean,
    //this alows using the 'value' prop for a different purpose
    value: String   
}</pre>

    <pre>&lt;my-checkbox v-model="foo" value="some value" /&gt;</pre>

<p>The above is equivalent to:</p>

<pre>&lt;my-checkbox
    :checked="foo"
    @change="val => { foo = val }"
    value="some value" /&gt;</pre>

    <p><strong>Note:</strong> the <code>checked</code> property must be explicitly declared.</p>

    <h4><a href="https://vuejs.org/v2/guide/components.html#Non-Parent-Child-Communication">Non Parent-Child Communication</a></h4>

    <p>When two components need to communicate with eachother, but are not in a parent/child relationship, an empty Vue instance can serve as a central bus.</p>

    <pre>var bus = new Vue();</pre>

    <pre>//in component A's method
bus.$emit('id-selected', 1)</pre>

    <pre>//in component B's created hook
bus.$on('id-selected', function (id) {
    //...
})</pre>

    <p><strong>Note:</strong> in more complex cases, consider employing a dedicated state-management pattern (topics covered later).</p>

    <h3><a href="https://vuejs.org/v2/guide/components.html#Content-Distribution-with-Slots">Content Distribution with Slots</a></h3>

    <p>It is desited to compose components like this:</p>

    <pre>&lt;app&gt;
    &lt;app-header /&gt;
    &lt;app-footer /&gt;
&lt;/app&gt;</pre>

    <p>The two main things to note are:</p>

    <ol>
        <li>The <code>&lt;app&gt;</code> component does not know what content it will receive. It is decided by the component using <code>&lt;app&gt;</code></li>
        <li>The <code>&lt;app&gt;</code> component likely has its own template.</li>
    </ol>

    <p>For composition to work, the parent "content" needs to be interwoven with the component's own template. This is a process called <strong>content distribution</strong>. Vue.js implementes a content distribution API modeled after the current <em>Web Components spec draft</em> using the special <code>&lt;slot&gt;</code> element to serve as distribution outlets for the original content.</p>

    <h4><a href="https://vuejs.org/v2/guide/components.html#Compilation-Scope">Compilation Scope</a></h4>

    <p>Consider the following template:</p>

    <pre>&lt;child-component&gt;
    {<span style="width:0px"></span>{ message }}
&lt;/child-component&gt;</pre>

    <p>The <code>message</code> is bound to the parent's data.</p>

    <blockquote>Everything in the parent template is compiled in parent scope; everything in the child template is compiled in child scope.</blockquote>

    <p>A common mistake is trying to bind a directive to a child property/method in the parent template:</p>

    <pre>&lt;child-coponent v-show="someChildProperty" /&gt;</pre>

    <p>Because the parent template is unaware of the state of a child component, someChildProperty is inaccessible to the parent.</p>

    <p>To bind child-scope directives on a component root node, do so in the child component's own template.</p>

    <pre>&lt;template&gt;
    &lt;div v-show="someChildProperty"&gt;Child&lt;/div&gt;    
&lt;/template&gt;
....
data: function () {
    return {
        someChildProperty: true
    }
}</pre>

	<p>Distributed content will be compiled in the parent scope.</p>

	<h4><a href="https://vuejs.org/v2/guide/components.html#Single-Slot">Single Slot</a></h4>

	<p>Parent content is <strong>discarded</strong> unless the chld component template contains at least one <code>&lt;slot&gt;</code> outlet. When there is only one slot with no attributes, the entire conten fragment will be inserted at its position in the DOM, replacing the slot itself.</p>

	<p>Whatever is initially within the <code>&lt;slot&gt;</code> tag is considered <strong>fallback content</strong>. Fallback content is compiled in the child scope and will only be displayed if the hosting element is empty and has no content to be inserted.</p>

	<p>Suppose there is a component <code>my-component</code> with the following template:</p>

	<pre>&lt;div&gt;
	&lt;h2&gt;I'm the child title&lt;/h2&gt;
	&lt;slot&gt;
		This will only be displayed if there is no content to be distributed.
	&lt;/slot&gt;
&lt;/div&gt;</pre>

	<p>And a parent that uses the component:</p>

	<pre>&lt;div&gt;
	&lt;h1&gt;I'm the parent title&lt;/h1&gt;
	&lt;my-component&gt;
		&lt;p&gt;This is some original content&lt;/p&gt;
		&lt;p&gt;This is some more original content&lt;/p&gt;
	&lt;/my-component&gt;
&lt;/div&gt;</pre>

	<p>The rendered result will be:</p>

	<pre>&lt;div&gt;
	&lt;h1&gt;I'm the parent title&lt;/h1&gt;
	&lt;div&gt;
		&lt;h2&gt;I'm the child title&lt;/h2&gt;
		&lt;p&gt;This is some original content&lt;/p&gt;
		&lt;p&gt;This is some more original content&lt;/p&gt;
	&lt;/div&gt;
&lt;/div&gt;</pre>


	<h4><a href="https://vuejs.org/v2/guide/components.html#Named-Slots">Named Slots</a></h4>

	<p><code>&lt;slot&gt;</code> elements have a special attribute, <code>name</code>, which can be used to further customize how content should be distributed. There can be multiple slots with different names. A named slot will match any element that has a corresponding <code>slot</code> attribute in the content fragment.</p>

	<p>There can still be one unnamed slot, the <strong>default slot</strong> that serves as a catch-all outlet for any unmatched content. If there is not default slot, unmatched content will be discarded.</p>

	<p>Consider an <code>app-layout</code> component with the following template:</p>

	<pre>&lt;div class="container"&gt;
	&lt;header&gt;
		&lt;slot name="header"&gt;&lt;/slot&gt;
	&lt;/header&gt;
	&lt;main&gt;
		&lt;slot&gt;&lt;/slot&gt;
	&lt;/main&gt;
	&lt;footer&gt;
		&lt;slot name="footer" &gt;&lt;/slot&gt;
	&lt;/footer&gt;
&lt;/div&gt;</pre>

	<p>Parent markup:</p>

	<pre>&lt;app-layout&gt;
	&lt;h1 slot="header"&gt;Header might be a page title&lt;/h1&gt;
	
	&lt;p&gt;A paragraph for the main content.&lt;/p&gt;
	&lt;p&gt;And another one&lt;/p&gt;
	
	&lt;p slot="footer"&gt;Here's some contact info&lt;/p&gt;
&lt;/app-layout&gt;</pre>

	<p>The rendered result will be:</p>

	<pre>&lt;div class="container"&gt;
	&lt;header&gt;
		&lt;h1&gt;Here might be a page title&lt;/h1&gt;
	&lt;/header&gt;
	&lt;main&gt;
		&lt;p&gt;A paragraph for the main content.&lt;/p&gt;
		&lt;p&gt;And another one.&lt;/p&gt;
	&lt;/main&gt;
	&lt;footer&gt;
		&lt;p&gt;Here's some contact info&lt;/p&gt;
	&lt;/footer&gt;
&lt;/div&gt;</pre>

	<p>The content distribution API is a very useful mechanism when designing coonents that are meant to be composed together.</p>

	<h4><a href="https://vuejs.org/v2/guide/components.html#Scoped-Slots">Scoped Slots</a></h4>

	<p>A scoped slot is a special type of slot that functions as a reusable template (than can be passed data to) instead of already-rendered-elements.</p>

	<p>In a child component, pass data into a slot as if you are passing props to a component.</p>

	<pre>&lt;div class="child"&gt;
	&lt;slot text="hello from child"&gt;&lt;/slot&gt;
&lt;/div&gt;</pre>

	<p>In the parent, a <code>&lt;template&gt;</code> element with a special attribute <code>slot-scope</code> msut exist, indicating that it is a template for scoped slot. The value of <code>slot-scope</code> will be used as the name of a temporary variable that holds the props object passed from the child:</p>

	<pre>&lt;div class="parent"&gt;
	&lt;child&gt;
		&lt;template slot-scope="props"&gt;
			&lt;span&gt;hello from parent&lt;/span&gt;
			&lt;span&gt;{<span style="width:0px"></span>{ props.text }}&lt;/span&gt;
		&lt;/template&gt;
	&lt;/child&gt;
&lt;/div&gt;</pre>

	<pre>&lt;div class="parent"&gt;
	&lt;div class="child"&gt;
		&lt;span&gt;hello from parent&lt;/span&gt;
		&lt;span&gt;hello from child&lt;/span&gt;
	&lt;/div&gt;
&lt;/div&gt;</pre>


	<p>A more typical use case for scoped slots would be a list component that allows the component consumer to customize how each item in the list should be rendered:</p>

	<pre>&lt;my-awesome-list :items="items"&gt;
	&lt;li
		slot="item"
		slot-scope="props"
		class="my-fancy-item"&gt;
		{<span style="width:0px"></span>{ props.text }}
	&lt;/li&gt;
&lt;/my-awesome-list&gt;</pre>

	<p>And the template for the list component:</p>

	<pre>&lt;ul&gt;
	&lt;slot name="item"
		v-for="item in items"
		:text="item.text"&gt;
		&lt;p&gt;Fallback content&lt;/p&gt;
&lt;/ul&gt;</pre>

	<h5>Destructuring</h5>

	<p><code>slot-scope</code> value is a valid JavaScript expression that can appear in the argument position of a function signature. This means that in supported environments (single-file components or modern browsers) you can use ES2015 destructuring in the expression:</p>

	<pre>&lt;child&gt;
	&lt;span slot-scope="{ text }"&gt;{<span style="width:0px"></span>{ text }}&lt;/span&gt;
&lt;/child&gt;</pre>

	<h3><a href="https://vuejs.org/v2/guide/components.html#Dynamic-Components">Dynamic Components</a></h3>

	<p>The same mount point can be dynamically switched between mutliple components using the reserved <code>&lt;component&gt;</code> element and sdynamically bind to its <code>is</code> attribute:</p>

	<pre>var vm = new Vue({
	el: '#example',
	data: {
		currentView: 'home'
	},
	components: {
		home: {...},
		posts: {...},
		archive: {...}
	}
});</pre>

	<pre>&lt;component v-bind:is="currentView"&gt;
	<<span style="width:0px"></span>!--component changes when vm.currentView changes!-->
&lt;/component&gt;</pre>

	<p>Alternatively bind directly to component objects.</p>

	<pre>import SomeComponent from './SomeComponent.vue';

var vm = new Vue({
	el: '#example',
	data: {
		currentView: SomeComponent
	}
});</pre>

	<h4><a href="https://vuejs.org/v2/guide/components.html#keep-alive"><code>keep-alive</code></a></h4>

	<p>To keep the switched-out components in memory to preserve their state  or avoid re-rendering, wrap the dynamic component in a <code>&lt;keep-alive&gt;</code> element:</p>

	<pre>&lt;keep-alive&gt;
	&lt;component :is="currentView"&gt;
		<<span style="width:0px"></span>!--inactive components will be cached!-->
	&lt;/component&gt;
&lt;/keep-alive&gt;</pre>

	<p>More details on <code>&lt;keep-alive&gt;</code> can be read in the <a href="https://vuejs.org/v2/api/#keep-alive">API reference</a>.</p>


	<h3><a href="https://vuejs.org/v2/guide/components.html#Misc">Miscellaneous</a></h3>

	<h4><a href="https://vuejs.org/v2/guide/components.html#Authoring-Reusable-Components">Authoring Reusable Components</a></h4>

	<p>When authoring a component it is good to keep in mind whether the component is meant to be reused somewhere else later. One-off components can be tightly coupled, but reusable components should define a clean public interface and make no assumptions about the context it is used in.</p>

	<p>The API for a Vue component comes in three parts: <strong>props</strong>, <strong>events</strong>, and <strong>slots</strong>.</p>

	<dl class="dl-horizontal">
		<dt>Props</dt>
		<dd>allow the external environment to pass data into the component</dd>
		<dt>Events</dt>
		<dd>allow the component to trigger side effects in the external environment</dd>
		<dt>Slots</dt>
		<dd>allow the external environment to compose the component with extra content</dd>
	</dl>

	<p>With the dedicated shorthand syntax for <code>v-bind</code> and <code>v-on</code>, the intents can be clearly and succintly conveyed in the template:</p>

	<pre>&lt;my-component
	:foo="baz"
	:bar="qux"
	@event-a="doThis"
	@event-b="doThat"
&gt;
	&lt;img slot="icon" src="..."&gt;
	&lt;p slot="main-text"&gt;Hello!&lt;/p&gt;
&lt;/my-component&gt;</pre>

	<h4><a href="https://vuejs.org/v2/guide/components.html#Child-Component-Refs">Child Component Refs</a></h4>

	<p>Sometimes there is a need to directly access a child component in JavaScript, regardless of props or components. To achieve this use a reference ID on the child component using <code>ref</code>:</p>

	<pre>&lt;div id="parent"&gt;
	&lt;user-profile ref="profile" /&gt;
&lt;/div&gt;</pre>

	<pre>var parent = new Vue({ el: '#parent' });
//access child component instance
var child = parent.$refs.profile;</pre>

	<p>When <code>ref</code> is used together with <code>v-for</code>, the ref you get will be an array containing the child components mirriring the data source.</p>

	<div class="alert alert-danger">
		<p><code>$refs</code> are only populated after the component has been rendered, and it is not reactive. It is meant as an escape hatch for direct child manipulation - <strong>avoid using <code>$refs</code> in templates or computed properties</strong>.</p>
	</div>


	<h4><a href="https://vuejs.org/v2/guide/components.html#Async-Components">Async Components</a></h4>

	<p>Large applications may need to divide the app into smaller chunks and only load a component from the server when it is needed. To simplify this, Vue allows the developer to define a component as a factory function that asynchronously resolves a component definition. Vue will only trigger the factory function when the component actually needs to be rendered and will cache the result for future re-renders.</p>

	<pre>Vue.component('async-example', function (resolve, refect) {
	setTimeout(function () {
		//Pass the component definition to the resolve callback
		resolve({
			remplate: '&lt;div&gt;I am async!&lt;/div&gt;'
		})
	}, 1000);	
});</pre>

	<p>The factory function receives a <code>resolve</code> callback, which is called when the component definition has been retrieved from the server. <code>reject(reason)</code> can also be called to indicate that the load has failed. <code>setTimeout</code> is being used for demonstration; actual code retrieval is up to the developer. A recommended approach is to use async components together with <a href="https://webpack.js.org/guides/code-splitting/">Webpack's code-splitting feature</a>:</p>

	<pre>Vue.component('async-webpack-example', function (resolve) {
	//this special require syntax will instruct Webpack to automatically split your build code into bundles which are loaded over Ajax requests.	
});</pre>

	<p>A <code>Promise</code> can also be returned from the factory function, with Webpack 2 + ES2015 syntax:</p>

	<pre>Vue.component (
	'async-webpack-example',
	//The 'import' function returns a 'Promise'
	() => import('./my-async0component')		
)</pre>

	<p>When using <strong>local registration</strong>, aa function that returns a <code>Promise</code> can be used directly:</p>

	<pre>new Vue({
	// ...
	components: {
		'my-component': () => import('./my-async-component')
	}
})</pre>

	<div class="alert alert-danger">
		<p><strong>Browserify</strong> Browserify does not, and likely will never, support asynchronous loading. There are a few workarounds that can be employed.</p>
	</div>

	<h4><a href="https://vuejs.org/v2/guide/components.html#Advanced-Async-Components">Advanced Async Components</a></h4>

	<p>Starting in 2.3.0+ the async component factory can also return an object of the following format:</p>

	<pre>const AsyncComp = () => ({
	//the component to load. Should be a Promise.
	component: import('./MyComp.vue'),
	//a component to use while the async component is loading
	loading: LoadingComp,
	//a component to use if the load failt
	error: ErrorComp
	//a delay before showing the loading component, default: 200ms
	delay: 200,
	//the error component will be displayed if a timeout is provided and exceeded, default: infinity
	timeout: 3000
})</pre>

	<div class="alert alert-info">
		<p>When used as a route component in <code>vue-router</code>, these properties will be ignored because async components are resolved upfront before the route navigation happens. To use the above syntax for route component use <code>vue-router</code>.</p>
	</div>

	<h4><a href="https://vuejs.org/v2/guide/components.html#Component-Naming-Conventions">Component Naming Conventions</a></h4>

	<p>When registering components (or props), use kebab-case, camelCase or PascalCase (all accepted):</p>

	<pre>components: {
	//registering using kebab-case
	'kebab-cased-component': {...},
	//camelCase
	'camelCasedComponent': {...},
	//PascalCase
	'PascalCasedComponent': {...}
}</pre>

	<p>Within the HTML templates though, the kebab-case equivalents <strong>MUST</strong> be used.</p>

	<pre>&lt;kebab-cased-component /&gt;
&lt;camel-cased-component /&gt;
&lt;pascal-cased-component /&gt;</pre>

	<p>When using string templates, component namings are not restricted by HTMLs case-insensitive restrictions. Hence in the template the component can be referenced using:</p>

	<ul>
		<li>kebab-case</li>
		<li>camelCase or kebab-case if the component has been defined using camelCase</li>
		<li>kebab-case, camelCase or PascalCase if the component has been defined using PascalCase</li>
	</ul>

	<pre>components: {
	'kebab-cased-component': {...},
	camelCasedComponent: {...},
	PascalCasedComponent: {...}
}</pre>

	<pre>&lt;kebab-cased-component /&gt;

&lt;camel-cased-component /&gt;
&lt;camelCasedComponent /&gt;

&lt;pascal-cased-component /&gt;
&lt;pascalCasedComponent /&gt;
&lt;PascalCasedComponent /&gt;
</pre>

	<p>PascalCase is the most <em>universal declaration convention</em> and kebab-case is the most universal <em>usage convention</em>.</p>

	<p>If the component isn't passed content via <code>slot</code> elements, you can even make it self-closing with a <code>/</code> after the name:</p>
	
	<pre>&lt;my-component /&gt;</pre>

	<div class="alert alert-warning">
		<p>This <em>only</em> works within string templates, as self-closing custom elements are not valid HTML and the browser's native parser will not understand them.</p>
	</div>


	<h4><a href="https://vuejs.org/v2/guide/components.html#Recursive-Components">Recursive Components</a></h4>

	<p>Components can revursively invoke themselves in their own template. However this can only be done using the <code>name</code> option:</p>

	<pre>name: 'unique-name-of-my-component'</pre>

	<p>When a component is registered globally using <code>Vue.component</code>, the global ID is automatically set as the component's <code>name</code> option.</p>

	<pre>Vue.component('unique-name-of-my-component', {
	...
})</pre>

	<p>If care is not exercised, recursive components can also lead to infinite loops:</p>

	<pre>name: 'stack-overflow',
template: '&lt;div&gt;&lt;stack-overflow /&gt;&lt;/div&gt;</pre>

	<p>The component above will result in a "max stack size exceeded" error, so make recursive invocation conditional (ie. use <code>v-if</code> that will eventaully evaluate to <code>false</code>.</p>

	<h4><a href="https://vuejs.org/v2/guide/components.html#Circular-References-Between-Components">Circular References Between Components</a></h4>

	<p>In the example of building a file directory tree, there's likely two components: <code>tree-folder</code> and <code>tree-folder-contents</code>.</p>

	<pre>&lt;p&gt;
	&lt;span&gt;{<span style="width:0px"></span>{ folder.name }}&lt;/span&gt;
	&lt;free-folder-contents :children="folder.children" /&gt;
&lt;/p&gt;</pre>

<pre>&lt;ul&gt;
	&lt;li v-for="child in children"&gt;
		&lt;tree-folder v-if="child.children" :folder="child" /&gt;
		&lt;span v-else&gt;{<span style="width:0px"></span>{ child.name }}&lt;/span&gt;
	&lt;/li&gt;
&lt;/ul&gt;</pre>

	<p>These components are both <em>ancestor</em> and <em>descendant</em> in the render tree. When registering components globally, this is not an issue as Vue handles the paradox automatically.</p>

	<p>If using a <strong>module system</strong> using Webpack or Browserify there'll be an error due to the infinite dependency loop "A needs B, but B first needs A, but A first needs B....". To fix this the module system needs a point at which it can define: "A needs B <em>eventually</em>, but there's no need to resolve B first."</p>

	<p>In the given file directory tree example, that point should be the <code>tree-folder</code> component as the child (<code>tree-folder-contents</code>) creates the paradox, wait until the <code>beforeCreate</code> lifecycle hook to register it:</p>

	<pre>beforeCreate: function () {
	this.$options.components.TreeFolderContents = require('./tree-folder-contents.vue')		
}</pre>

	<h4><a href="https://vuejs.org/v2/guide/components.html#Inline-Templates">Inline Templates</a></h4>

	<p>When the <code>inline-template</code> special attribute is present on a child component, the component will use its inner content as its template, rather than treating it as distributed content. This allows more flexible template-authoring.</p>

	<pre>&lt;my-component inline-template&gt;
	&lt;div&gt;
		&lt;p&gt;These are compiled as the component's own template&lt;/p&gt;
		&lt;p&gt;Not parent's transclusion content.&lt;/p&gt;
	&lt;/div&gt;
&lt;/my-component&gt;</pre>

	<p><code>inline-template</code> makes the scope of your templates harder to reason about. As a best practice, prefer defining templates inside the component using the <code>template</code> option or in a <code>template</code> element in a <code>.vue</code> file.</p>


	<h4><a href="https://vuejs.org/v2/guide/components.html#X-Templates">X-Templates</a></h4>

	<p>Template can also be defined inside of a script element with the type <code>text/x-template</code>, then referencing the template by an id:</p>

	<pre>&lt;script type="text/x-template" id="hello-world-template"&gt;
	&lt;p&gt;Hello hello hello&lt;/p&gt;
&lt;/script&gt;</pre>

	<pre>Vue.component('hello-world', {
	template: '#hello-world-template'		
})</pre>

	<p>Useful for demos with large templates or in extremely small applications, but otherwise should be avoided as templates get separated from the rest of the component definition.</p>


	<h4><a href="https://vuejs.org/v2/guide/components.html#Cheap-Static-Components-with-v-once">Cheap Static Components wigh <code>v-once</code></a></h4>

	<p>Plain HTML elements are very fast in Vue, but sometimes there may be a component that contains a <strong>lot</strong> of static content. In these cases, ensure it is only validated once then cached by using the <code>v-once</code> directive on the root element.</p>

	<pre>&lt;template&gt;
	&lt;div v-once&gt;
		&lt;h1&gt;Terms of Service&lt;/h1&gt;
		..... alot of static content...
	&lt;/div&gt;
&lt;/template&gt;</pre>

</section>