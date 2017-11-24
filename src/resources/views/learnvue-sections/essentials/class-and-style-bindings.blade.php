<section name="Class and Style Bindings">
    <h2><a href="https://vuejs.org/v2/guide/class-and-style.html">Class and Style Bindings</a></h2>

    <p>Commonly data binding is used to manipulate an element's class list and inline styles, binding attibutes has already been briefly covered using <code>v-bind</code>. However there are special enhancements for <code>v-bind</code> when used on <code>class</code> and <code>style</code> for string evaluation, as well as objects and arrays.</p>

    <h3><a href="https://vuejs.org/v2/guide/class-and-style.html#Binding-HTML-Classes">Binding HTML Classes</a></h3>

    <h4><a href="https://vuejs.org/v2/guide/class-and-style.html#Object-Syntax">Object Syntax</a></h4>

    <p>Passing an object to <code>v-bind:class</code> allows for dynamic toggling of classes.</p>

    <div>
        <object-syntax-sample class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/class-and-style.html#Array-Syntax">Array Syntax</a></h4>

    <div>
        <array-syntax-sample class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/class-and-style.html#With-Components">With Components</a></h4>
    
    <p>When using the <code>class</code> attribute on a custom component, those classes are added to the component's root element. Existing classes are not overwritten.</p>

<pre>
&lt;my-component v-bind:class="{ active: isActive }"&gt;&lt;/my-component&gt;</pre>

    <h3><a href="https://vuejs.org/v2/guide/class-and-style.html#Binding-Inline-Styles">Binding Inline Styles</a></h3>

    <h4><a href="https://vuejs.org/v2/guide/class-and-style.html#Object-Syntax-1">Object Syntax</a></h4>

    <p>The object syntax for <code>v-bind:style</code> is straightforward, it's virtually CSS except as a JavaScript object that you can use camelCase or kebab-case (use quotes with kebab-case) for the CSS property names.</p>

    <p><code>&lt;div v-bind:style="{ color: activeColor, 'font-size': fontSize + 'px' }"&gt;&lt;/div&gt;</code></p>

    <p>It's often a good idea to bind to a style object directly so that the template is kept clean.</p>

    <p><code>&lt;div v-bind:style="styleObject"&gt;&lt;/div&gt;</code></p>
<pre>
data: {
    styleObject: {
        color: 'red',
        'font-size': '13px'</pre>


    <h4><a href="https://vuejs.org/v2/guide/class-and-style.html#Array-Syntax-1">Array Syntax</a></h4>

    <p>The array syntax for <code>v-bind:style</code> allows you to apply multiple style objects to the same element:</p>

    <p><code>&lt;div v-bind:style="[baseStyles, overridingStyles]"&gt;&lt;/div&gt;</code></p>

    <h4><a href="https://vuejs.org/v2/guide/class-and-style.html#Auto-prefixing">Auto-Prefixing</a></h4>

    <p>When using a CSS property that requires a vendor prefix in <code>v-bind:style</code>, for example <code>transform</code>, Vue will automatically detect and add appropriate prefixes to the applied styles.</p>

    <h4><a href="https://vuejs.org/v2/guide/class-and-style.html#Multiple-Values">Multiple Values</a></h4>

    <p>Starting in 2.3.0+ you can provide an array of multiple (prefixed) values to a style property:</p>

    <p><code>&lt;div v-bind:style="{ display: ['-webkit-box', '-ms-flexbox', 'flex'] }"&gt;&lt;/div&gt;</code></p>

    <p>Only the last value in the array which the browser supports will be rendered.</p>

</section>