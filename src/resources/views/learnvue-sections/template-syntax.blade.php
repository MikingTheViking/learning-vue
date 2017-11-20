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
                    <div>
                        <text-interpolation class="vue-component-root row" />
                    </div>

                    <h4>Raw (Unescaped) HTML</h4>
                    <div>
                        <raw-html-interpolation class="vue-component-root row" />
                    </div>

                    <h4>Attributes</h4>
                    <div>
                        <attributes-interpolation class="vue-component-root row" />
                    </div>

                    <h4>JavaScript Expressions</h4>
                    <div>
                    <javascript-expressions-interpolation class="vue-component-root row" />
                    </div>


                </div>
                <div class="col-sm-12">
                    
                    <h3><a href="https://vuejs.org/v2/guide/syntax.html#Directives">Directives</a></h3>

                    <p>Directives are special attributes with the <code>v-</code> prefix. Directive attributes are expected to be a <strong>single JavaScript expression</strong> (with the exception of <code>v-for</code>). The purpose of a directive is to reactively apply side effects to the DOM when the value of its expression changes.</p>
                    <div>
                        <directive-sample class="vue-component-root row" />
                    </div>

                    <h4><a href="https://vuejs.org/v2/guide/syntax.html#Arguments">Arguments</a></h4>

                    <div>
                        <arguments-directive class="vue-component-root row" />
                    </div>

                    <h4><a href="https://vuejs.org/v2/guide/syntax.html#Modifiers">Modifiers</a></h4>

                    <div>
                        <modifiers-directive class="vue-component-root row" />
                    </div>
                </div>

                <div class="col-sm-12">
                
                    <h3><a href="https://vuejs.org/v2/guide/syntax.html#Shorthands">Shorthands</a></h3>

                    <p>The <code>v-</code> prefix is a cue for identifying Vue-specific attributes in a template. However this can get verbose for frequently used directives. For this reason there are special shorthands for <code>v-bind</code> and <code>v-on</code>, which are <code>:</code> and <code>@</code> respectively.</p>

                    <div>
                        <shorthand-directive class="vue-component-root row" />
                    </div>

                </div>
            </section>