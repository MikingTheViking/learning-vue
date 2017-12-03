<section name="Computed Properties and Watchers">
    <h2><a href="https://vuejs.org/v2/guide/computed.html">Computer Properties and Watchers</a></h2>

    <p>In-template expressions are convenient, but are meant for simple operations. Hence for any complex logic a <strong>computed property</strong> should be used.</p>

    <p>Computed properties are dependant on other properties, Vue is aware of this and when a change occurs to the data property, the computed property will also be updated.</p>

    <div id="vue-computed-property-sample">
        <computed-property-sample class="vue-component-root row" />
    </div>

    <h3><a href="https://vuejs.org/v2/guide/computed.html#Computed-Caching-vs-Methods">Computed Caching vs. Methods</a></h3>

    <p>Computed properties can also be declared as a method, the difference and subsequent benefit of computed properties is that <strong>computed properties arecached based on their dependencies</strong>.</p>

    <p>A computed property will only re-evaluate when some of its dependencies have changed. In comparison, a method invocation will <strong>always</strong> run the function whenever a re-render happens.</p>

    <h3><a href="https://vuejs.org/v2/guide/computed.html#Computed-vs-Watched-Property">Computed vs. Watched Properties</a></h3>

    <p>Although Vue.js provides a generic way to observe and react to data changes using <strong>watch properties</strong>, depending on the use case it is usually better ot use a <strong>computed property</strong>.</p>

    <h3><a href="https://vuejs.org/v2/guide/computed.html#Computed-Setter">Computed Setter</a></h3>

    <p>Computed properties are by default "getter-only", but you can provide a setter when needed:</p>

<pre>
...
computed: {
    fullName: {
        //getter
        get: function() {
            return this.firstName + ' ' + this.lastName
        },
        //setter
        set: function (newValue) {
            var names = newValue.split(' ');
            this.firstName = names[0];
            this.lastName = names[name.length - 1]
        }
    }
}
</pre>
    <p>In the example above, calling <code>vm.fullName = "New Name"</code> the setter wil be invoked and <code>vm.firstName</code> and <code>vm.lastName</code> will be updated.</p>

    <h3><a href="https://vuejs.org/v2/guide/computed.html#Watchers">Watchers</a></h3>

    <p><code>watch</code> is best used for asynchronous or expensive operations in response to changed data.</p>

    <div id="vue-complex-watch">
        <complex-watch class="root-vue-component root" />
    </div>

</section>