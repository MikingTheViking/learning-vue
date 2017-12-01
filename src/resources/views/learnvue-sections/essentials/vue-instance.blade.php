<section name="The Vue Instance">
    <h2><a href="https://vuejs.org/v2/guide/instance.html#Creating-a-Vue-Instance">The Vue Instance</a></h2>
    <div class="col-sm-12">
        <p>Every Vue application starts by creating a new Vue Instance with the <code>Vue</code> function and passing in the relevant initialization <code>options</code>.</p>
        <p><small>Refer to <a href="https://vuejs.org/v2/api/#Options-Data">options</a></small> for the full options API.</p>
        <pre>var vm = new Vue({
    //options
});</pre>
        <div id="vue-basic-instance">
            <basicinstance class="vue-component-root row"></basicinstance>
        </div>
        
    </div>
    <h3><a href="https://vuejs.org/v2/guide/instance.html#Data-and-Methods">Vue Instance Data and Methods</a></h3>
    <div class="col-sm-12">
        <p>All properties in a Vue instance's <code>data</code> object are added to it's <b>reactivity system</b>.</p>
        <p class='lead'>When reactive properties are changed they cause the view to update.</p>
        <pre>var data = { a: 1 };

var vm = new Vue({
    data:data
});</pre>
    <p><b>Note:</b> only the properties that are present in <code>data</code> when the Vue instance was initialized will be <b>reactive</b>. Hence if a property is needed at a later time, some initial value must be set.</p>

    <div id="vue-data-bind">
        <databindsample class="vue-component-root row"></databindsample>
    </div> 

    <hr>
    <p>Vue instances also expose some useful instance properties and methods which are prefixed by <code>$</code> to differentiate from user-defined properties. An example of a useful instance method is <code>watch</code>.</p>
    <pre>//instance method $watch
vm.$watch('a', function (newValue, oldValue) {
    //callback runs when vm.a changes
});</pre>
    <p><small>Refer to <a href="https://vuejs.org/v2/api/#Instance-Properties">Instance Properties and Methods</a> for the full <code>$</code> API.</small></p>
    <p>You can also include watched variables as part of the standalone component. The <code>watch</code> properties is an object where each key is a function name corresponding to a variable in the Vue component's data.</p>
    <pre>data: function () {
    return {
        time: x
    }
},
watch: {
    time (newval) {
        //function content here
    }
}</pre>
        <div id="vue-instance-methods">
            <instancemethods class="vue-component-root row"></instancemethods>
        </div>
    </div>
    <h3><a href="https://vuejs.org/v2/guide/instance.html#Instance-Lifecycle-Hooks">Vue Instance Lifecycle Hooks</a></h3>
    <div class="col-sm-12">
        <p>Each Vue instance goes through a series of initialization steps when created:</p>
        <ul>
            <li>set up data observation</li>
            <li>compile the template</li>
            <li>mount the instance to the DOM</li>
            <li>update the DOM when data changes</li>
        </ul>
    </div>
    <div class="container vertical-middle-container">
        <div class="col-xs-6">
            <p>During these steps it runs functions called <b>lifecycle hooks</b> allowing custom code to be executed at the desired stage.</p>
            <ol>
                <li>beforeCreate</li>
                <li>created</li>
                <li>beforeMount</li>
                <li>mounted</li>
                <li>beforeUpdate (repeated cycle)</li>
                <li>update (repeated cycle)</li>
                <li>beforeDestroy</li>
                <li>destroyed</li>
            </ol>
        </div>
        <div class="col-xs-6">
            <figure class="figure">
                <img src="/images/vue-lifecycle.png" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                <figcaption class="figure-caption">Lifecycle Diagram</figcaption>
            </figure>
        </div>
    </div>
</section>