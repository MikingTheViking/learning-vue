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

    
    <div class="col-sm-6">
        <blockquote>Props Down, Events Up</blockquote>
        <p>The parent passes data down to the child via <strong>props</strong>, and the child sends messages to the parent via <strong>events</strong>.</p>
    </div>
    <div class="col-sm-6">
        <div class="thumbnail">
            <img src="/images/vue-props-events.png" />
            <div class="caption">
                <h3>Props Down, Events Up</h3>
                <p>A visual representation of the concept in a parent-child component relationship.</p>
            </div>
        </div>
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

    <div>
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

    <div>
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

    

</section>