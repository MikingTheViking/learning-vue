<section name="List Rendering">
    <h2><a href="https://vuejs.org/v2/guide/list.html">List Rendering</a></h2>

    <h3><a href="https://vuejs.org/v2/guide/list.html#Mapping-an-Array-to-Elements-with-v-for">Mapping an Array to Elements with <code>v-for</code></a></h3>

    <p>The <code>v-for</code> directive can be used to render a list of items based on an array. <code>v-for</code> requires a special syntax in the form of <code>item in items</code> (note: <code>item of items</code>, also works), where <code>items</code> is the source data array and <code>item</code> is an <strong>alias</strong> for the array element being iterated on.</p>

<pre>&lt;ul&gt;
    &lt;li v-for="item in items"&gt;
        {<span class="width:0px"></span>{ item.message }}
    &lt;/li&gt;
&lt;/ul&gt;</pre>

<pre>...
data: {
    items: [
        {message: 'first'},
        {message: 'second'}
    ]   
}</pre>

    <div>
        <for-basic-sample class="vue-component-root row" />
    </div>

    <p><code>v-for</code> blocks also have full access to parent scope properties. For instance <code>v-for</code> supports an optional second argument for the index of the current item.</p>
<pre>&lt;ul&gt;
    &lt;li v-for="(item, index) in items"&gt;
        {<span class="width:0px"></span>{ parentMessage }} - {<span class="width:0px"></span>{ index }} - {<span class="width:0px"></span>{ item.message }}
    &lt;/li&gt;
&lt;/ul&gt;</pre>

<pre>...
data: {
    parentMessage: 'test',
    items: [
        {message: 'first'},
        {message: 'second'}
    ]   
}</pre>

    <div>
        <for-basic-with-index-sample class="vue-component-root row" />
    </div>

    <h3><a href="https://vuejs.org/v2/guide/list.html#v-for-with-an-Object"><code>v-for</code> with an Object</a></h3>

    <p><code>v-for</code> can also be used to iterate through the properties of an object.</p>

<pre>&lt;ul&gt;
    &lt;li v-for="value in object"&gt;
        {<span style="width:0px"></span>{ value }}
    &lt;/li&gt;
&lt;/ul&gt;</pre>

<pre>data: {
    object: {
        firstName: 'John',
        lastName: 'Doe',
        age: 30
    }
}</pre>

    <div>
        <for-object-value-sample class="vue-component-root row" />
    </div>

    <p>A second argument can be provided for the key:</p>


    <div>
        <for-object-key-value-sample class="vue-component-root row" />
    </div>
    
    <p>A third argument can be provided  for the index:</p>

    <div>
        <for-object-index-key-value-sample class="vue-component-root row" />
    </div>

    <h3><a href="https://vuejs.org/v2/guide/list.html#key"><code>key</code></a></h3>

    <p><strong>Note:</strong> Vue.js uses an "in-place patch" strategy on updates. This means that if the order of data has changed, Vue patches each element in-place to reflect what it should be rendered as at that particular index.</p>

    <p>For this reason, it is recommended to provide a <code>key</code> attribute for each item; helping Vue.js to identify each node.</p>

    <pre>&lt;div v-for="item in items" :key="item.id"&gt;
    ....content....
&lt;/div&gt;</pre>

    <h3><a href="https://vuejs.org/v2/guide/list.html#Array-Change-Detection">Array Change Detection</a></h3>

    <h4><a href="https://vuejs.org/v2/guide/list.html#Mutation-Methods">Mutation Methods</a></h4>

    <p>Mutation methods <em>mutate</em> the original array. Vue.js wraps an observed array's mutation methods so that they also trigger view updates. The wrapped methods are:</p>

    <ul>
        <li><code>push()</code></li>
        <li><code>pop()</code></li>
        <li><code>shift()</code></li>
        <li><code>unshift()</code></li>
        <li><code>splice()</code></li>
        <li><code>sort()</code></li>
        <li><code>reverse()</code></li>
    </ul>

    <h4><a href="https://vuejs.org/v2/guide/list.html#Replacing-an-Array">Replacing an Array</a></h4>

    <p>There are non-mutating methods, such as <code>filter()</code>, <code>concat()</code>, and <code>slice()</code> which do not mutate the original array but <strong>always return a new array</strong>. Non-mutating methods can be used to replace the old array with the new one.</p>

    <p><strong>Note: </strong> Vue.js does not destroy/re-render the entire existing DOM list, it maximizes the elemtn reuse making replacing an array with another array containing overlapping elements an efficient operation.</p>

    <h4><a href="https://vuejs.org/v2/guide/list.html#Caveats">Caveats or Array Manipulation</a></h4>

    <p>Due to limitations of JavaScript, Vue.js <strong>cannot</strong> detect the following array changes:</p>

    <ol>
        <li>Directly setting an item with an index: <code>vm.items[index] = newValue</code></li>
        <li>Modifying the length of an array: <code>vm.items.length = newLength</code></li>
    </ol>

    <p>To overcome caveat #1, use <code>Vue.set</code> or <code>Array.prototype.splice</code> to trigger state updates in the reactivity system.</p>

    <pre>Vue.set(example1.items,indexOfItem, newValue)</pre>
    <pre>example1.items.splice(indexOfItem, 1, newValue)</pre>

    <p>To overcome caveat #2, use <code>splice</code>:</p>

    <pre>example1.items.splice(newLength)</pre>

    <h4><a href="https://vuejs.org/v2/guide/list.html#Object-Change-Detection-Caveats">Object Change Detection Caveats</a></h4>

    <p>As with the previous caveat, due to the limitations of JavaScript <strong>Vue cannot detect property addition or deletion</strong>.</p>

    <pre>var vm = new Vue({
    data: {
        a: 1
    }
});
//vm.a is reactive    
vm.b = 2;   //not reactive</pre>

    <p>Vue disallows dynamically adding new roo-tlevel reactive properties to already created instances. Though it is possible to add reactive properties to a nested object using <code>Vue.set(object, key, value)</code>. For instance:</p>

<pre>var vm = new Vue({
    data: {
        userProfile: {
            name: 'Anika'
        }
    }
});</pre>

    <p>You can add a new <code>age</code> property to the nested userProfile object with:</p> 
    <pre>Vue.set(vm.userProfile, 'age', 27)</pre>

    <p>Alternatively, use the <code>vm.$set</code> instance method, which is an alias for the global <code>Vue.set</code>:</p>
    <pre>this.$set(this.userProfile, 'age', 27)</pre>


    <p>When assigning a number of new properties to an existing object (using <code>Object.assign()</code> or <code>_.extend()</code> create a fresh object with the properties from both.</p>

<pre>this.userProfile = Object.assign({}, this.userProfile, {
    age: 27,
    favouriteColor: 'Vue Green'
})</pre>

    <h4><a href="https://vuejs.org/v2/guide/list.html#Displaying-Filtered-Sorted-Results">Displaying Filtered/Sorted Results</a></h4>

    <p>Sometimes there is a need to display a filtered or sorted version of an array without any mutations or resetting of the original data. Createa  computed property that returns the filtered or sorted array.</p>

<pre>&lt;li v-for="n in evenNumbers"&gt;{<span style="width:0px"></span>{ n }} &lt;/li&gt;</pre>
<pre>data: {
    number: [1, 2, 3, 4, 5]
},
computed: {
    evenNumbers: function () {
        return this.numbers.filter(function (number) {
            return number % 2 === 0;
        });
    }
}</pre>

    <p>In the situations where computed properties are not feasible (such as inside nested <code>v-for</code> loops), you can use a method:</p>

<pre>&lt;li v=for="n in event(numbers"&gt;{<span style="width:0px"></span>{ n }}&lt;/li&gt;</pre>

<pre>data: {
    number: [1, 2, 3, 4, 5]
},
methods: {
    event: function (numbers) {
        return numbers.filter(function (number) {
            return number % 2 === 0;
        });
    }
}</pre>

    <h3><a href="https://vuejs.org/v2/guide/list.html#v-for-with-a-Range"><code>v-for</code> with a Range</a></h3>

    <p><code>v-for</code> can also take an integer, it will repeat the template that many times.</p>

    <pre>&lt;div&gt;
    &lt;span v-for="n in 10"&gt;{<span style="width:0px"></span>{ n }} &lt;/span&gt;
&lt;/div&gt;</pre>


    <h3><a href="https://vuejs.org/v2/guide/list.html#v-for-on-a-lt-template-gt"><code>v-for</code> on a <code>template</code></a></h3>

    <p>Similar to template <code>v-if</code> a <code>&lt;template&gt;</code> tag with a <code>v-for</code> to render a block of multiple elements.</p>

    <pre>&lt;ul&gt;
    &lt;template v-for="item in items"&gt;
        &lt;li&gt;{<span style="width:0px"></span>{ item.msg }}&lt;/li&gt;
        &lt;li class="divider"&gt;&lt;/li&gt;
    &lt;/template&gt;
&lt;/ul&gt;</pre>

    <p><strong>Note</strong>: I've been unable to get template directivves to work in components, this is due to different approachs between components and root-only elements (?)</p>


    <h3><a href="https://vuejs.org/v2/guide/list.html#v-for-with-v-if"><code>v-for</code> with <code>v-if</code></a></h3>

    <p>When both <code>v-for</code> and <code>v-if</code> exist on the same node, <code>v-for</code> takes higher priority than <code>v-if</code>. This means that <code>v-if</code> will be run on each iteration of the loop separately. Useful for only rendering <em>some</em> items.</p>

    <pre>&lt;li v-for="todo in todos" v-if="!todo.isComplete"&gt;
    {<span style="width:0px"></span>{ todo }}
&lt;/li&gt;</pre>

    <p>The previous code will only render todos that are <strong>not</strong> complete.</p>

    <p>Alternatively, to conditionally skip the execution of the loop, wrap the <code>v-for</code> in a <code>v-if</code> wrapper element (or <code>&lt;template&gt;</code>).</p>

    <pre>&lt;ul v-if="todos.length"&gt;
    &lt;li v-for="todo in todos"&gt;
        {<span style="width:0px"></span>{ todo }}
    &lt;/li&gt;
&lt;/ul&gt;
&lt;p v-else&gt;No todos left&lt;/p&gt;</pre>

    <h3><a href="https://vuejs.org/v2/guide/list.html#v-for-with-a-Component"><code>v-for</code> with a Component</a></h3>

    <p><code>v-for</code> can be used directly on a custom component, just like any normal element.</p>

    <pre>&lt;my-component v-for="item in items" :key="item.id" /&gt;</pre>

    <p><strong>Note: </strong> As of 2.2.0+ <code>v-for</code> on a component requires a <code>key</code>.</p>

    <p>Components have isolated scopes, in order to pass data into the component use props:</p>

    <pre>&lt;my-component
    v-for="(item, index) in items"
    v-bind:item="item"
    v-bind:index="index"
    v-bind:key="item.id"
/&gt;</pre>


    <div>
        <simple-todo-list class="vue-component-root row" />
    </div>

</section>