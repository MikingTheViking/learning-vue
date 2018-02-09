<section name="Event Handling">
    <h2><a href="https://vuejs.org/v2/guide/events.html">Event Handling</a></h2>

    <h3><a href="https://vuejs.org/v2/guide/events.html#Listening-to-Events">Listening to Events</a></h3>

    <p>Use the <code>v-on</code> directive to listen to DOM events and execute JavaScript when triggered.</p>

    <div id="vue-simple-on-event">
        <simple-on-event class="vue-component-root row" />
    </div>


    <h3><a href="https://vuejs.org/v2/guide/events.html#Method-Event-Handlers">Method Event Handlers</a></h3>

    <p>Logic for many event handlers is more complex, making it not feasible to keep the value of the <code>v-on</code> attribute. Hence, <code>v-on</code> can also accept the name of a method.</p>

    <div id="vue-simple-on-event-method">
        <simple-on-event-method class="vue-component-root row" />
    </div>


    <h3><a href="https://vuejs.org/v2/guide/events.html#Methods-in-Inline-Handlers">Methods in Inline Handlers</a></h3>

    <p>Alternatively instead of binding directly to a method name, we can also use methods in an inline JavaScript statement:</p>

    <div id="vue-simple-inline">
        <simple-inline class="vue-component-root row" />
    </div>

    <p>To access the original DOM event in an inline statement handler, pass it into a method using the special <code>$event</code> variable:</p>

    <pre>&lt;button v-on:click="warn('Form cannot be submitted yet.', $event)"&gt;
    Submit
&lt;/button&gt;</pre>

    <pre>methods: {
    warn: function (message, event) {
        if (event) event.preventDefault();
        alert(message);
    }
}</pre>

    <h3><a href="https://vuejs.org/v2/guide/events.html#Event-Modifiers">Event Modifiers</a></h3>

    <p>Commonly <code>event.preventDefault()</code> or <code>event.stopPropagation()</code> are called inside event handlers, this can be tedious and verbose. Vue provides <strong>event modifiers</strong> for <code>v-on</code> as directive postfixes:</p>

    <ul>
        <li><code>.stop</code></li>
        <li><code>.prevent</code></li>
        <li><code>.capture</code></li>
        <li><code>.self</code></li>
        <li><code>.once</code></li>
    </ul>

    <table class="table">
        <thead>
            <tr>
                <th>Sample</th>
                <th>Explanation</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>&lt;a v-on:click.stop="doThis"&gt;&lt;/a&gt;</code></td>
                <td>the click event's propagation will be stopped</td>
            </tr>
            <tr>
                <td><code>&lt;form v-on:submit.prevent="onSubmit"&gt;&lt;/form&gt;</code></td>
                <td>the submit event will no longer reload the page</td>
            </tr>
            <tr>
                <td><code>&lt;a v-on:click.stop.prevent="doThat"&gt;&lt;/a&gt;</code></td>
                <td>modifiers can be chained</td>
            </tr>
            <tr>
                <td><code>&lt;form v-on:submit.prevent&gt;&lt;/form&gt;</code></td>
                <td>modifier <strong>only</strong></td>
            </tr>
            <tr>
                <td><code>&lt;div v-on:click.capture="doThis"&gt;&lt;/div&gt;</code></td>
                <td>use capture mode when adding the event listener (i.e. an event targeting an inner element is handled here before being handled by that element)</td>
            </tr>
            <tr>
                <td><code>&lt;div v-on:click.self="doThat"&gt;&lt;/div&gt;</code></td>
                <td>only trigger handler if event.target is the element itself (i.e. not from a child element)</td>
            </tr>
            <tr>
                <td><code>&lt;a v-on:click.once="doThis"&gt;&lt;/a&gt;</code></td>
                <td>the click event will be triggered at most once<br /><strong>NOTE: </strong> unlike the other modifiers, which are exclusive to native DOM event, the <code>.once</code> modifier can be used on <strong> component events</strong></td>
            </tr>
        </tbody>
    </table>

    <p><strong>NOTE:</strong> Order matters when using modifiers as the relevant code is generated in the same order. Therefore <code>@click.prevent.self</code> will prevent <strong>all clicks</strong> while <code>@click.self.prevent</code> will only prevent clicks on the element itself.</p>

    <h3><a href="https://vuejs.org/v2/guide/events.html#Key-Modifiers">Key Modifiers</a></h3>

    <p>When listening for keyboard events, a specific key code is often checked for. Vue allows adding key modifiers for <code>v-on</code> when listening for key events. For instance, in the sample below <code></code>m.submit()</code> is only called when the <code>keyCode</code> is 13 (enter).</p>

    <pre>&lt;input v-on:keyup.13="submit"&gt;
    &lt;input @keyup.13="submit"&gt;</pre>

    <p>Remembering a <code>keyCode</code> is a pain in the ass, so Vue provides aliases for the most commonly used keys:</p>

    <pre>&lt;input v-on:keyup.enter="submit"&gt;
    &lt;input @keyup.enter="submit"&gt;</pre>

    <ul>
        <li><code>.enter</code></li>
        <li><code>.tab</code></li>
        <li><code>.delete (captures both delete and backspace keys)</code></li>
        <li><code>.esc</code></li>
        <li><code>.space</code></li>
        <li><code>.up</code></li>
        <li><code>.down</code></li>
        <li><code>.left</code></li>
        <li><code>.right</code></li>
    </ul>

    <p>Custom key modifier aliases can be defined via the global <code>config.keyCodes</code>.</p>

    <pre>Vue.config.keyCodes.f1 = 112;</pre>


    <h4><a href="https://vuejs.org/v2/guide/events.html#Automatic-Key-Modifers">Automatic Key Modifiers</a></h4>

    <p>Valid key names exposed via <code>KeyboardEvent.key</code> can be used directly as modifiers by converting them to kebab-case:</p>

    <pre>&lt;input @keyup.page-down="onPageDown"&gt;</pre>

    <p>In the above example, the handler will only be called if <code>$event.key === 'PageDown'</code>.</p>

    <h3><a href="https://vuejs.org/v2/guide/events.html#System-Modifier-Keys">System Modifier Keys</a></h3>

    <p>Additional modifiers can be used to trigger mouse or keyboard event listeners only when the corresponding modifier is pressed:</p>

    <ul>
        <li><code>.ctrl</code></li>
        <li><code>.alt</code></li>
        <li><code>.shift</code></li>
        <li><code>.meta</code></li>
    </ul>

    <table class="table">
        <thead>
            <tr>
                <th>Sample</th>
                <th>Explanation</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>&lt;input @keyup.alt.76="clear"&gt;</code></td>
                <td>Alt + C</td>
            </tr>
            <tr>
                <td><code>&lt;div @click.ctrl="doSomething"&gt;Do Something&lt;/div&gt;</code></td>
                <td>Alt + C</td>
            </tr>
        </tbody>
    </table>

    <h4><a href="https://vuejs.org/v2/guide/events.html#exact-Modifier"><code>.exact</code> Modifier</a></h4>

    <p>The <code>.exact</code> modifier should be used in combination with other system modifiers to indicate that the exact combination of modifiers must be pressed for the handler to fire.</p>

    <table class="table">
        <thead>
            <tr>
                <th>Sample</th>
                <th>Explanation</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>&lt;button @client.ctrl="onClick"&gt;A&lt;/button&gt;</code></td>
                <td>this will fire even if alt or shift is also pressed</td>
            </tr>
            <tr>
                <td><code>&lt;button @client.ctrl.exact="onCtrlClick"&gt;A&lt;/button&gt;</code></td>
                <td>this will only fire when only ctrl is pressed</td>
            </tr>
        </tbody>
    </table>

    <h4><a href="https://vuejs.org/v2/guide/events.html#Mouse-Button-Modifiers">Moust Button Modifiers</a></h4>

    <p>These modifiers restrict the handler to events triggered by a specific mouse button.</p>

    <ul>
        <li><code>.left</code></li>
        <li><code>.right</code></li>
        <li><code>.middle</code></li>
    </ul>

</section>