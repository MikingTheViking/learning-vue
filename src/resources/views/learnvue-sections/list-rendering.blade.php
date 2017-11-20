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

    

</section>