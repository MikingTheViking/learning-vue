<section name="Form Input Bindings">
    <h2><a href="https://vuejs.org/v2/guide/forms.html">Form Input Bindings</a></h2>

    <h3><a href="https://vuejs.org/v2/guide/forms.html#Basic-Usage">Basic Usage</a></h3>

    <p>The <code>v-model</code> directive can be used to create two-way data bindings on form input and textarea elements. It automatically picks the correct way to update the element based on the input type.</p>

    <p><strong>Note:</strong> <code>v-model</code> will ignore the initial  <code>value</code>, <code>checked</code> or <code>selected</code> attributes found on any form elements. Declare the initial value on the JavaScript side, inside the <code>data</code> option of the component.</p>

    <h4><a href="https://vuejs.org/v2/guide/forms.html#Text">Text</a></h4>

    <pre>&lt;input v-model="message" placeholder="edit me" /&gt;
&lt;p&gt;Message is: {<span style="width:0px"></span>{ message }}&lt;/p&gt;</pre>

    <div id="vue-simple-text-binding">
        <simple-text-binding class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/forms.html#Multiline-text">Multiline Text</a></h4>

    <p>Interpolation does not work on textareas (<code>&lt;textarea&gt; {<span style="width:0px"></span>{ message }} &lt;/textarea&gt;</code>) so <code>v-model</code> has to be used.</p>

    <pre>&lt;textarea v-model="message" placeholder="add multiple lines"&gt;&lt;/textarea&gt;</pre>

    <div id="vue-simple-textarea-binding">
        <simple-textarea-binding class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/forms.html#Checkbox">Checkbox</a></h4>

    <p>There are two approaches for checkboxes: single checkbox and multiple checkboxes.</p>

    <p>A single checkbox uses a boolean value:</p>

    <pre>&lt;input type="checkbox" id="checkbox" v-model="checked" /&gt;
&lt;label for="checkbox"&gt;{<span style="width:0px"></span>{ checked }}&lt;/label&gt;</pre>

    <div id="vue-simple-checkbox-single-binding">
        <simple-checkbox-single-binding class="vue-component-root row" />
    </div>

    <p>Multiple checkboxes can be bound to the same array.</p>

    <div id="vue-simple-checkbox-multiple-binding">
        <simple-checkbox-multiple-binding class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/forms.html#Radio">Radio</a></h4>

    <div id="vue-radio-binding">
        <radio-binding class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/forms.html#Select">Select</a></h4>

    <div id="vue-select-binding">
        <select-binding class="vue-component-root row" />
    </div>

    <h3><a href="https://vuejs.org/v2/guide/forms.html#Value-Bindings">Value Bindings</a></h3>

    <p>For radio, checkbox and select options <code>v-model</code> binding values are usually static strings (or booleans for checkboxes).</p>

    <table class="table">
        <thead>
            <tr>
                <th>Sample</th>
                <th>Explanation</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>&lt;input type="radio" v-model="picked" value="a" /&gt;</code></td>
                <td>'picked' is a string "a" when checked</td>
            </tr>
            <tr>
                <td><code>&lt;input type="checkbox" v-model="toggle" /&gt;</code></td>
                <td>'toggle' is either true or false</td>
            </tr>
            <tr>
                <td><pre>&lt;select v-model="selected"&gt;
    &lt;option value="abc"&gt;ABC&lt;/option&gt;
&lt;/select&gt;</pre></td>
                <td>'selected' is a string "abc" when selected</td>
            </tr>
        </tbody>
    </table>


    <p>Sometimes a value may be bound to a dynamic property on the Vue instance. Use <code>v-bind</code> to achieve that, furthermore <code>v-bind</code> allows binding the input value to non-string values.</p>


    <h4><a href="https://vuejs.org/v2/guide/forms.html#Checkbox-1">Checkbox Value Bindings</a></h4>

    <pre>&lt;input
    type="checkbox"
    v-model="toggle"
    v-bind:true-value="a"
    v-bind:false-value="b"
&gt;</pre>

    <p>When checked, <code>vm.toggle == vm.a</code>. When unchecked, <code>vm.toggle == vm.b</code></p>

    <div id="vue-checkbox-value-binding">
        <checkbox-value-binding class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/forms.html#Select-Options">Select Option Value Bindings</a></h4>

    <pre>&lt;select v-model="selected"&gt;
    &lt;option v-bind:value="{ number: 123 }"&gt;123&lt;/option&gt;
&lt;/select&gt;</pre>


    <div id="vue-select-options-binding">
        <select-options-binding class="vue-component-root row" />
    </div>


    <h3><a href="https://vuejs.org/v2/guide/forms.html#Modifiers">Modifiers</a></h3>

    <h4><a href="https://vuejs.org/v2/guide/forms.html#lazy"><code>.lazy</code></a></h4>

    <p><code>v-model</code> syncs the input with the data after each <code>input</code> event by default. Add a <code>.lazy</code> modifier to instead sync after <code>change</code> events.</p>

    <div id="vue-lazy-modifier">
        <lazy-modifier class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/forms.html#number"><code>.number</code></a></h4>

    <p>To automatically typecast user input as a number, add the <code>.number</code> modifier to the <code>v-model</code> managed input:</p>

    <pre>&lt;input v-model.number="age" type="number"&gt;</pre>

    <p><strong>Note</strong>: this is helpful as <code>type="number"</code> inputs return their values as a string.</p>

    <h4><a href="https://vuejs.org/v2/guide/forms.html#trim"><code>.trim</code></a></h4>

    <p>To automatically trim user input, use the <code>.trim</code> modifier to a <code>v-model</code> managed input.</p>

    <pre>&lt;input v-model.trim="msg"&gt;</pre>

    <h3><a><code>v-model</code> with Components</a></h3>

    <p>HTML's built-in input types don't always meet the needs of the software. Vue components allow the building of reusable inputs with completely customized behaviour that even work with <code>v-model</code>. Read about <strong>custom inputs</strong> in the Components section. TODO: link to it</p>

</section>