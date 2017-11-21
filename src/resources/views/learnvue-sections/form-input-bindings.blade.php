<section name="Form Input Bindings">
    <h2><a href="https://vuejs.org/v2/guide/forms.html">Form Input Bindings</a></h2>

    <h3><a href="https://vuejs.org/v2/guide/forms.html#Basic-Usage">Basic Usage</a></h3>

    <p>The <code>v-model</code> directive can be used to create two-way data bindings on form input and textarea elements. It automatically picks the correct way to update the element based on the input type.</p>

    <p><strong>Note:</strong> <code>v-model</code> will ignore the initial  <code>value</code>, <code>checked</code> or <code>selected</code> attributes found on any form elements. Declare the initial value on the JavaScript side, inside the <code>data</code> option of the component.</p>

    <h4><a href="https://vuejs.org/v2/guide/forms.html#Text">Text</a></h4>

    <pre>&lt;input v-model="message" placeholder="edit me" /&gt;
&lt;p&gt;Message is: {<span style="width:0px"></span>{ message }}&lt;/p&gt;</pre>

    <div>
        <simple-text-binding class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/forms.html#Multiline-text">Multiline Text</a></h4>

    <p>Interpolation does not work on textareas (<code>&lt;textarea&gt; {<span style="width:0px"></span>{ message }} &lt;/textarea&gt;</code>) so <code>v-model</code> has to be used.</p>

    <pre>&lt;textarea v-model="message" placeholder="add multiple lines"&gt;&lt;/textarea&gt;</pre>

    <div>
        <simple-textarea-binding class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/forms.html#Checkbox">Checkbox</a></h4>

    <p>There are two approaches for checkboxes: single checkbox and multiple checkboxes.</p>

    <p>A single checkbox uses a boolean value:</p>

    <pre>&lt;input type="checkbox" id="checkbox" v-model="checked" /&gt;
&lt;label for="checkbox"&gt;{<span style="width:0px"></span>{ checked }}&lt;/label&gt;</pre>

    <div>
        <simple-checkbox-single-binding class="vue-component-root row" />
    </div>

    <p>Multiple checkboxes can be bound to the same array.</p>

    <div>
        <simple-checkbox-multiple-binding class="vue-component-root row" />
    </div>


</section>