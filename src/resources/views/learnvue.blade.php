<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('inclusions.navbar')
        <div class="container-fluid">
            <div class="page-header">
                <h1>Vue.js <small>A learning exercise with the Viking</small></h1>
            </div>
            <section name="What is it?">
                <h2>What is it?</h2>
                <p>Vue.js is a <em>progressive</em> front end framework for building user interfaces.</p>
                <div class="alert alert-info">
                <p><strong>Note: </strong>It is strongly recommended you download the Vue.js browser extension for your developer tools.</p>
                <ul>
                    <li><a href="https://chrome.google.com/webstore/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd?hl=en">Vue.js Devtools for Chrome</a></li>
                    <li><a href="https://addons.mozilla.org/en-US/firefox/addon/vue-js-devtools/">Vue.js Devtool for Firefox</a></li>
                </ul>
                </div>
            </section>
            <section name="The Vue Instance">
                <h2><a href="https://vuejs.org/v2/guide/instance.html#Creating-a-Vue-Instance">The Vue Instance</a></h2>
                <div class="col-sm-12">
                    <p>Every Vue application starts by creating a new Vue Instance with the <code>Vue</code> function and passing in the relevant initialization <code>options</code>.</p>
                    <p><small>Refer to <a href="https://vuejs.org/v2/api/#Options-Data">options</a></small> for the full options API.</p>
                    <pre>
var vm = new Vue({
    //options
});
                    </pre>
                    <basicinstance class="vue-component-root row"></basicinstance>
                </div>
                <h3><a href="https://vuejs.org/v2/guide/instance.html#Data-and-Methods">Vue Instance Data and Methods</a></h3>
                <div class="col-sm-12">
                    <p>All properties in a Vue instance's <code>data</code> object are added to it's <b>reactivity system</b>.</p>
                    <p><b><em>When reactive properties are changed they cause the view to update.</em></b></p>
                    <pre>
var data = { a: 1 };

var vm = new Vue({
    data:data
});              
    </pre>
                    <p><b>Note:</b> only the properties that are present in <code>data</code> when the Vue instance was initialized will be <b>reactive</b>. Hence if a property is needed at a later time, some initial value must be set.</p>
                    <databindsample class="vue-component-root row"></databindsample>

                    <hr>
                    <p>Vue instances also expose some useful instance properties and methods which are prefixed by <code>$</code> to differentiate from user-defined properties. An example of a useful instance method is <code>watch</code>.</p>
                    <pre>
//instance method $watch
vm.$watch('a', function (newValue, oldValue) {
    //callback runs when vm.a changes
});              
                    </pre>
                    <p><small>Refer to <a href="https://vuejs.org/v2/api/#Instance-Properties">Instance Properties and Methods</a> for the full <code>$</code> API.</small></p>
                    <p>You can also include watched variables as part of the standalone component. The <code>watch</code> properties is an object where each key is a function name corresponding to a variable in the Vue component's data.</p>
                    <pre>
                    data: function () {
                        return {
                            time: x
                        }
                    },
                    watch: {
                        time (newval) {
                            //function content here
                        }
                    }
                    </pre>
                    <instancemethods class="vue-component-root row"></instancemethods>
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
                        <div class="thumbnail">
                            <img class="img-responsive" src="/images/vue-lifecycle.png" />
                            <div class="caption">
                                <h3>Lifecycle Diagram</h3>
                                <p>The lifecycle of a Vue component is shown top-to-bottom in the diagram above.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section name="Template Syntax">
                <h2><a href="https://vuejs.org/v2/guide/syntax.html">Template Syntax</a></h2>
                <div class="col-sm-12">
                    <p>Vue.js uses HTML-based template syntax to declaratively bind the rendered DOM to the underlying Vue instance data. All Vue.js templates are valid HTML that can be parsed by browsers and HTML parsers.</p>
                    <div class="alert alert-info" role="alert">
                        <p><b>Interesting!</b></p>
                        <p>Vue compiles the templates into the Virtual DOM render functions. Using the reactivity system, Vue can determine the minimal number of components to re-render and apply the minimal amount of DOM manipulations during state changes.</p>
                    </div>
                </div>
                <div class="col-sm-12">
                    
                    <h3><a href="https://vuejs.org/v2/guide/syntax.html#Interpolations">Interpolations</a></h3>
                    
                    <p>Interpolations are comprised of data binding using <em>Mustache syntax</em> (<code>{<span style="width:0px"> </span>{ someVarOrLogic }<span style="width:0px"> </span>}</code>) and Vue directives (<code>&lt;div v-html="rawHTML"&gt;&lt;/div&gt;</code>).</p>

                    <h4>Text</h4>

                    <p>The most basic form of data binding is a text interpolation with the <em>Mustache Syntax</em>. The mustach tag will be replaced with the value of the property used in the mustache.</p>




                </div>
            </section>
        </div>
        
        
    </div>

    @{{ something }}

    <!-- Scripts -->
    <script src="{{ asset('js/learnvue.js') }}"></script>

    @include('inclusions.browsersync')
</body>
</html>
