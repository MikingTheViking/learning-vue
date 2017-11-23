<section name="Conditional Rendering">
    <h2><a href="https://vuejs.org/v2/guide/conditional.html">Conditional Rendering</a></h2>

    <h3><a href="https://vuejs.org/v2/guide/conditional.html#v-if"><code>v-if</code></a></h3>

    <p>Vue supports conditional rendering with <code>v-if</code>, <code>v-else-if</code>, <code>v-else</code>.</p>

    <p>Conditionally render an element using <code>v-if</code>.</p>

    <p><code>&lt;h1 v-if="ok"&gt;Yes&lt;/h1&gt;</code></p>

    <p>Add an else block using <code>v-else</code></p>

<pre>&lt;h1 v-if="ok"&gt;Yes&lt;/h1&gt;
&lt;h1 v-else&gt;No&lt;/h1&gt;</pre>

    <h4><a href="https://vuejs.org/v2/guide/conditional.html#Conditional-Groups-with-v-if-on-lt-template-gt">Conditional Groups with <code>v-if</code> on <code>&lt;template&gt;</code></a></h4>

    <p><code>v-if</code> is a directive, hence it must be attached to a single element. To toggle more than one element <code>v-if</code> can be used on a <code>&lt;template&gt;</code> element to serve as an invisible wrapper. The final rendered result will not include the <code>&lt;template&gt;</code> element.</p>

<pre>&lt;template v-if="ok"&gt;
    &lt;h1&gt;Title&lt;/h1&gt;
    &lt;p&gt;Paragraph 1&lt;/p&gt;
    &lt;p&gt;Paragraph 2&lt;/p&gt;
&lt;/template&gt;</pre>

    <h4><a href="https://vuejs.org/v2/guide/conditional.html#v-else"><code>v-else</code></a></h4>

    <p>Use the <code>v-else</code> directive to indicate an "else block" for <code>v-if</code>.</p>

    <p><strong>NOTE:</strong> the <code>v-else</code> element must immediately follow a <code>v-if</code> or a <code>v-else-if</code> element, otherwise it will not be recognized.</p>

<pre>&lt;div v-if="Math.random() > 0.5"&gt;
    Now you see me
&lt;/div&gt;
&lt;div v-else&gt;
    Now you don't
&lt;/div&gt;
</pre>

    <h4><a href="https://vuejs.org/v2/guide/conditional.html#v-else-if"><code>v-else-if</code></a></h4>

    <p><strong>Note:</strong> New in 2.1.0+</p>

    <p><code>v-else-if</code> serves as an "else if block" for <code>v-if</code>. It can be chained multiple times.</p>

    <p><strong>NOTE:</strong> just as with <code>v-else</code>, a <code>v-else-if</code> must immediately follow a <code>v-if</code> or <code>v-else-if</code> element.</p>


    <h4><a href="https://vuejs.org/v2/guide/conditional.html#Controlling-Reusable-Elements-with-key">Controlling Reusable Elements with <code>key</code></a></h4>

    <p>Vue tries to render elements as efficiently as possible, frequently re-using instead of re-rendering from scratch. This approach offers other advantages, such as preserving input if toggling between two templates.</p>

<pre>&lt;template v-if="loginType === 'username'"&gt;
    &lt;label&gt;Username&lt;/label&gt;
    &lt;input placeholder="Enter your username" /&gt;
&lt;/template&gt;
&lt;template v-else&gt;
    &lt;label&gt;Email&lt;/label&gt;
    &lt;input placeholder="Enter your email address" /&gt;
&lt;/template&gt;
</pre>

    <p>Switching the <code>loginType</code> in the code above will not erase the values already entered since both template use the same elements, only the <code>placeholder</code>.</p>

    <div>
        <conditional-rendering-sample class="vue-component-root row" />
    </div>
    
    <p>When this is not desired, simply add a <code>key</code> attribute with unique values:</p>

<pre>&lt;template v-if="loginType === 'username'"&gt;
    &lt;label&gt;Username&lt;/label&gt;
    &lt;input placeholder="Enter your username" key="username-input" /&gt;
&lt;/template&gt;
&lt;template v-else&gt;
    &lt;label&gt;Email&lt;/label&gt;
    &lt;input placeholder="Enter your email address" key="email-input" /&gt;
&lt;/template&gt;
</pre>

    <div>
        <conditional-rendering-key-sample class="vue-component-root row" />
    </div>

    <h3><a href="https://vuejs.org/v2/guide/conditional.html#v-show"><code>v-if</code></a></h3>

    <p><code>v-show</code> is another option to conditionall display an element, the usage is mostly the same as with <code>v-if</code>.</p>

    <p><code>&lt;h1 v-show="ok"&gt;Hello!&lt;/h1&gt;</code></p>

    <p>The difference is that an element with <code>v-show</code> will always be rendered and remain in the DOM; <code>v-show</code> only toggles the <code>display</code> CSS property of the element.</p>

    <h3><a href="https://vuejs.org/v2/guide/conditional.html#v-if-vs-v-show"><code>v-if</code> vs <code>v-show</code></a></h3>

    <p><code>v-if</code> performs "real" conditional rendering because it ensures that event listeners, and child components inside the conditional blocks are properly destroyed and re-created during toggles. It is also <strong>lazy</strong>: if the conditional is false on intial render, it will not do anything until the condition becomes true for the first time.</p>

    <p>In comparison, <code>v-show</code> is much simpler as the element is always rendered regardless of initial condition, with CSS-based toggling.</p>

    <p><code>v-if</code> has higher toggle costs while <code>v-show</code> has higher initial render costs. The preference is to use <code>v-show</code> if you need to toggle often, then <code>v-if</code> if the condition is unliklely to change at runtime.</p>

    <h3><a href="https://vuejs.org/v2/guide/conditional.html#v-if-with-v-for"><code>v-if</code> with <code>v-for</code></a></h3>

    <p>When used together, <code>v-for</code> has a higher priority than <code>v-if</code>. See the next section for further notes on this.</p>


</section>