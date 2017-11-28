<section name="Enter/Leave &amp; List Transitions">
    <h2><a href="https://vuejs.org/v2/guide/transitions.html">Enter/Leave &amp; List Transitions</a></h2>

    <h3><a href="https://vuejs.org/v2/guide/transitions.html#Overview">Overview</a></h3>

    <p>Vue provides a variety of ways to apply transition effects when items are inserted, updated, or removed from the DOM. This inludes tools to:</p>

    <ul>
        <li>automatically apply classes for CSS transitions and animations</li>
        <li>integrate 3rd-party CSS animation libraries, such as Animate.css</li>
        <li>use JavaScript to directly manipulate the DOM during transition books</li>
        <li>integrate 3rd-party JavaScript animation libraries, such as Velocity.js</li>
    </ul>

    <h3><a href="https://vuejs.org/v2/guide/transitions.html#Transitioning-Single-Elements-Components">Transitioning Single Elements/Components</a></h3>

    <p>Vue provides <code>transition</code> wrapper component, allowing the author to add entering/leaving transitions for any element or component in the following contexts:</p>

    <ul>
        <li>Conditional rendering (using <code>v-if</code>)</li>
        <li>Confitional display (using <code>v-show</code>)</li>
        <li>Dynamic components</li>
        <li>Component root nodes</li>
    </ul>

    <pre>&lt;div id="demo"&gt;
    &lt;button v-on:click="show = !show"&gt;
        Toggle
    &gt;/button&gt;
    &lt;transition name="fade"&gt;
        &lt;p v-if="show"&gt;hello&lt;/p&gt;
    &lt;/transition&gt;
&lt;/div&gt;</pre>

    <pre>.fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to {
    opacity:0;
}</pre>

    <div>
        <basic-opacity class="vue-component-root row" />
    </div>

    <p>When an element wrapped in a <code>transition</code> component is inserted or removed, the following occurs:</p>

    <ol>
        <li>Vue will automatically determng whether the target element has CSS transitions or animations applied. If so, CSS transition classes will be added /removed at appropriate timings.</li>
        <li>If the transition component provided JavaScript hooks, these hooks will be called at appropriate timings.</li>
        <li>If no CSS transitions/animations are detected and no JavaScript hooks are provided, the DOM operations for insertion and/or removal will be executed immediately on the next frame (<strong>Note:</strong> the browser's animation frame, NOT tthe Vue.js concept of <code>nextTick</code>)</li>
    </ol>

    <h4><a href="https://vuejs.org/v2/guide/transitions.html#Transition-Classes">Transition Classes</a></h4>

    <p>There are six classes applied for enter/leave transitions:</p>

    <dl>
        <dt><code>v-enter</code></dt>
        <dd>Starting state for enter. Added before the element is inserted, removed one frame after the element is inserted.</dd>
        <dt><code>v-enter-active</code></dt>
        <dd>Active state for enter. Applied during the entire entering phase. Added before the element is inserted, removed when transition/animation finishes. This class can be used to define the duration, delay and easing curve for the entering transition.</dd>
        <dt><code>v-enter-to</code></dt>
        <dd><strong>Only available in 2.1.8+</strong>. Ending state for enter. Added one frame after the element is inserted (at the same time <code>v-enter</code> is removed) then removed when the transitions/animation finishes.</dd>
        <dt><code>v-leave</code></dt>
        <dd>Starting state for leave. Added immediately when a leaving transition is triggered, removed after one frame.</dd>
        <dt><code>v-leave-active</code></dt>
        <dd>Active state for leave. Applied during the entire leaving phase. Added immediately when leave transition is triggered, removed when the transition/animation finishes. This class can be used to define the duration, delay and easing curve for the leaving transition.</dd>
        <dt><code>v-leave-to</code></dt>
        <dd><strong>Only avaialble in 2.1.8+</strong>. Ending state for leave. Added one frame after a leaving transition is triggered (at the same time <code>v-leave</code> is removed), removed when the transition /animation finishes.</dd>
    </dl>

    <img src="images/vue-transition-classes.png" />

    <p>Each of these classes will be prefixed with the name of the transition. In the example above, the <code>v-</code> prefix is the default, used when a <code>&lt;transition&gt;</code> element has no name. If a name is used on the transition (such as <code>&lt;transition name="my-transition"&gt;</code> then the <code>v-enter</code> class would instead be <code>my-transition-enter</code>.</p>

    <p><code>v-enter-active</code> and <code>v-enter-leave</code> enable the ability to speify different easing curves for enter/leave transitions.</p>


    <h4><a href="https://vuejs.org/v2/guide/transitions.html#CSS-Transitions">CSS Transitions</a></h4>

    <p>One of the most common transition types uses CSS transitions.</p>

    <pre>&lt;div id="example-1"&gt;
    &lt;button @click="show = !show"&gt;
        Toggle
    &lt;/button&gt;
    &lt;transition name="slide-fade"&gt;
        &lt;p v-if="show"&gt;hello&lt;/p&gt;
    &lt;/transition&gt;
&lt;/div&gt;</pre>

    <pre>.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}</pre>

    <div>
        <advanced-opacity class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/transitions.html#CSS-Animations">CSS Animations</a></h4>

    <p>CSS animations are applied in the same way as CSS transitions, the difference is that <code>v-enter</code> is not removed immediately after the element is inserted, but on an <code>animationend</code> event.</p>

    <pre>&lt;div id="example-2"&gt;
    &lt;button @click="show = !show"&gt;Toggle show &lt;/button&gt;
    &lt;transition name="bounce"&gt;
        &lt;p v-if="show"&gt;Blah blah &lt;/p&gt;
    &lt;/transition&gt;
&lt;/div&gt;</pre>

    <pre>.bounce-enter-active {
  animation: bounce-in .5s;
}
.bounce-leave-active {
  animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}</pre>

    <div>
        <basic-animation class="vue-component-root row" />
    </div>

    <h4><a href="https://vuejs.org/v2/guide/transitions.html#Custom-Transition-Classes">Custom Transition Classes</a></h4>

    <p>Custom transition classes can be used to override the conventional class name (such as when using a third party CSS animation library like <em>Animate.css</em>) by providing the following attributes:</p>

    <ul>
        <li><code>enter-class</code></li>
        <li><code>enter-active-class</code></li>
        <li><code>enter-to-class</code></li>
        <li><code>leave-class</code></li>
        <li><code>leave-active-class</code></li>
        <li><code>leave-to-class</code></li>
    </ul>


    <div>
        <advanced-animation class="vue-component-root row" />
    </div>


    <h4><a href="https://vuejs.org/v2/guide/transitions.html#Using-Transitions-and-Animations-Together">Using Transitions and Animations Together</a></h4>

    <p>Vue attaches event listeners in order to know when a transition has ended. It acn either be <code>transitionend</code> or <code>animationend</code>, depending on the type of CSS rules applied. If only using one or the other, Vue can automatically detect the correct type.</p>

    <p>In some cases a component may use both (CSS animation triggered by Vue, CSS transition effect on hover) and in these cases it must be explicitly specified for Vue which type to care aboue in a <code>type</code> attribute with a value of either <code>animation</code> or <code>transition</code>.</p>

    <h4><a href="https://vuejs.org/v2/guide/transitions.html#Explicit-Transition-Durations">Explicit Transition Durations</a></h4>

    <p>By default, Vue waits for the first <code>transitionend</code> or <code>animationend</code> event on the root transition element to determine when the transition has finished. This may not always be desired (such as when using a choreographed transition sequence with delayed transitions, etc.).</p>

    <p>In these cases specify an explicit transition duration (in ms) using the <code>duration</code> prop on the <code>&lt;transition&gt;</code> component:</p>

    <pre>&lt;transition :duration="1000"&gt;....&lt;/transition&gt;</pre>

    <p>Explicit values can also be defined for enter and leave durations:</p>

    <pre>&lt;transition :duration="{ enter: 500, leave: 800 }"&gt;...&lt;/transition&gt;</pre>

    <h4><a href="https://vuejs.org/v2/guide/transitions.html#JavaScript-Hooks">JavaScript Hooks</a></h4>

    <p>JavaScript hooks can also be defined in attributes:</p>

    <pre>&lt;transition
    v-on:before-enter="beforeEnter"
    v-on:enter="enter"
    v-on:after-enter="afterEnter"
    v-on:enter-cancelled="enterCancelled"
    
    v-on:before-leave="beforeLeave"
    v-on:leave="leave"
    v-on:after-leave="afterLeave"
    v-on:leave-cancelled="leaveCancelled"
&gt;
....
&lt;/transition&gt;</pre>
    
    <pre>// ...
methods: {
  // --------
  // ENTERING
  // --------
  beforeEnter: function (el) {
    // ...
  },
  // the done callback is optional when
  // used in combination with CSS
  enter: function (el, done) {
    // ...
    done()
  },
  afterEnter: function (el) {
    // ...
  },
  enterCancelled: function (el) {
    // ...
  },
  // --------
  // LEAVING
  // --------
  beforeLeave: function (el) {
    // ...
  },
  // the done callback is optional when
  // used in combination with CSS
  leave: function (el, done) {
    // ...
    done()
  },
  afterLeave: function (el) {
    // ...
  },
  // leaveCancelled only available with v-show
  leaveCancelled: function (el) {
    // ...
  }
}</pre>

    <div>
        <javascript-hooks class="vue-component-root row" />
    </div>

    <p>These hooks can be used in combination with CSS transitions/animations or on their own.</p>

    <div class="alert alert-danger">
        <p>When using JavaScript-only transitions, the <code>done</code> callbacks are required for the <code>enter</code> and <code>leave</code> hooks. Otherwise the hooks will be called synchronously and the transition will finish immediately.</p>

        <hr>

        <p>It is also a good idea to explicitly add <code>v-bind:css="false"</code> for JavaScript-only transitions so that Vue can skip the CSS detection. This also prevents CSS rules from accidentally interfering with the transition.</p>
    </div>

    <h5>Example</h5>

    <p>Here is an example using Velocity.js</p>

    <pre>&lt;div&gt;
    &lt;button @click="show = !show"&gt;
        Toggle
    &lt;/button&gt;
    &lt;transition
        v-on:before-enter="beforeEnter"
        v-on:enter="enter"
        v-on:leave="leave"
        v-bind:css="false"
    &gt;
        &lt;p v-if="show"&gt;
            demo
        &lt;/p&gt;
    &lt;/transition&gt;
&lt;/div&gt;</pre>

    <pre>...
methods: {
    beforeEnter: function (el) {
        el.style.opacity = 0;
    },
    enter: function (el, done) {
      Velocity(el, { opacity: 1, fontSize: '1.4em' }, { duration: 300 })
      Velocity(el, { fontSize: '1em' }, { complete: done })
    },
    leave: function (el, done) {
      Velocity(el, { translateX: '15px', rotateZ: '50deg' }, { duration: 600 })
      Velocity(el, { rotateZ: '100deg' }, { loop: 2 })
      Velocity(el, {
        rotateZ: '45deg',
        translateY: '30px',
        translateX: '30px',
        opacity: 0
      }, { complete: done })
    }
}</pre>

	<div>
		<javascript-transition class="vue-component-root row" />
	</div>


	<h3><a href="https://vuejs.org/v2/guide/transitions.html#Transitions-on-Initial-Render">Transitions on Initial Render</a></h3>

	<p>To add a transition on the initial render of a node, add the <code>appear</code> attribute:</p>

	<pre>&lt;transition appear&gt;...</pre>

	<p>By default, this will use the transition specified for entering and leaving. Alternatively specify custom CSS classes:</p>

	<pre>&lt;transition
	appear
	appear-class="custom-appear-class"
	appear-to-class="custom-appear-to-class"
	appear-active-class="custom-appear-active-class"
&gt;.....&lt;/transition&gt;</pre>

	<p>and custom JavaScript hooks:</p>

	<pre>&lt;transition
	appear
	v-on:before-appear="customBeforeAppearHook"
	v-on:appear="customAppearHook"
	v-on:after-appear="customAfterAppearHook"
	v-on:appear-cancelled="customAppearCancelledHook"
&gt;....&lt;/transition&gt;</pre>

	<h3><a href="https://vuejs.org/v2/guide/transitions.html#Transitioning-Between-Elements">Transitioning Between Elements</a></h3>

	<p>Transitioning between raw components can be accomplished using <code>v-if</code>/<code>v-else</code>. A common two-element transition is between a list container and a message describing an empty list:</p>

	<pre>&lt;transition&gt;
	&lt;table v-if="items.length > 0"&gt;
		....
	&lt;/table&gt;
	&lt;p v-else&gt;Sorry, no items found.&lt;/p&gt;
&lt;/transition&gt;</pre>

	<div class="alert alert-danger">
		<p>When toggling between elements that have the <strong>same tag name</strong>, Vue must be explcitly instructed that they are distinct elements by providing unique <code>key</code> attributes. Otherwise Vue's compiler will only replace the content of the element for efficiency.</p>
		<hr>
		<p><em>It is considered good practice to always key multiple items within a <code>&lt;transition&gt;</code> component.</em></p>
	</div>

	<pre>&lt;transition&gt;
	&lt;button v-if="isEditing" key="save"&gt;
		Save
	&lt;/button&gt;
	&lt;button v-else key="edit"&gt;
		Edit
	&lt;/button&gt;
&lt;/transition&gt;</pre>

	<p>In these cases the <code>key</code> attribute can also be used to transition between different states of the same element. Instead of using <code>v-if</code> and <code>v-else</code>:</p>

	<pre>&lt;transition&gt;
	&lt;button v-bind:key="isEditing"&gt;
		{<span style="width:0px"></span>{ isEditing ? 'Save' : 'Edit'}}
	&lt;/button&gt;
&lt;/transition&gt;</pre>

	<p>This logic can be applied for transitioning between any number of elements, either by multiple <code>v-if</code>'s or binding a single element to a dynamic property.</p>

	<pre>&lt;transition&gt;
	&lt;button v-bind:key="docState"&gt;
		{<span style="width:0px"></span>{ buttonMessage}}
	&lt;/button&gt;
&lt;/transition&gt;</pre>

	<pre>...,
computed: {
	buttonMessage: function () {
		switch (this.docState) {
			case 'saved': return 'Edit'
			case 'edited': return 'Save'
			case 'editing': return 'Cancel'
		}
	}	
}</pre>

	<h4><a href="https://vuejs.org/v2/guide/transitions.html#Transition-Modes">Transition Modes</a></h4>

	<p>A problem that can be typically run into is when mutliple components enter and leave simultaneously. Try clicking the button below, you'll notice that there is a state where both buttons exist; one is transitioning in while the other is simultaneously transitioning out.</p>

	<div>
		<transition-modes-none class="vue-component-root row" />
	</div>

	<p>If the components are style correctly, this can work as a slide transition or replacement:</p>

	<div>
		<transition-modes-none-again class="vue-component-root row" />
	</div>

	<p>Simultaneous entering and leaving transitions aren't always desirable, so Vue offers some alternative <strong>transition modes</strong>:</p>

	<dl>
		<dt><code>in-out</code></dt>
		<dd>New element transitions in first, then when complete the current element transitions out.</dd>
		<dt><code>out-in</code></dt>
		<dd>Current element transitions out first, then when complete the new element transitions in.</dd>
	</dl>

	<div>
		<transition-modes class="vue-component-root row" />
	</div>

	<h3><a href="https://vuejs.org/v2/guide/transitions.html#Transitioning-Between-Components">Transitioning Between Components</a></h3>

	<p>Transitioning between components is simpley than transitioning between elements as no <code>key</code> attribute is needed. Instead wrap a dynamic component:</p>

	<pre>&lt;transition name="component-fade" mode="out-in"&gt;
	&lt;component v-bind:is="view" /&gt;
&lt;/transition&gt;</pre>

	<pre>....,
data() {
	return {
		view: 'v-a'
	}	
},
components: {
	'v-a': {
		template: '&lt;div&gt;Component A&lt;/div&gt;'
	},
	'v-b': {
		template: '&lt;div&gt;Component B&lt;/div&gt;'
	}	
}</pre>

<pre>.component-fade-enter-active, .component-fade-leave-active {
  transition: opacity .3s ease;
}
.component-fade-enter, .component-fade-leave-to
/* .component-fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}</pre>

	<div>
		<component-transition class="vue-component-root row" />
	</div>

	<h3><a href="https://vuejs.org/v2/guide/transitions.html#List-Transitions">List Transitions</a></h3>

	<p>Transitions, so far, have been managed for:</p>

	<ul>
		<li>Individual nodes</li>
		<li>Multiple nodes where only 1 is rendered at a time</li>
	</ul>

	<p>When intending to render a whole list of items simultaneously (such as with <code>v-for</code>) use the <code>&lt;transition-group&gt;</code> component.</p>

	<ul>
		<li>Unlike <code>&lt;transition&gt;</code>, it renders an actual element (a <code>&lt;span&gt;</code>) by default. This default tag can be changed with the <code>tag</code> attribute.</li>
		<li>Elements inside are <strong>always required</strong> to have a unique <code>key</code> attribute.</li>
	</ul>

	<h4><a href="https://vuejs.org/v2/guide/transitions.html#List-Entering-Leaving-Transitions">List Entering/Leaving Transitions</a></h4>

	<pre>&lt;div&gt;
	&lt;button v-on:click="add"&gt;Add&lt;/button&gt;
	&lt;button v-on:click="remove"&gt;Remove&lt;/button&gt;
	&lt;transition-group name="list" tag="p"&gt;
		&lt;span v-for="item in items" v-bind:keys="item" class="list-item"&gt;
			{<span style="width:0px"></span>{ item }}
		&lt;/span&gt;
	&lt;/transition&gt;
&lt;/div&gt;</pre>

	<pre>...,
data: {
	items: [1,2,3,4,5,6,7,8,9],
	nextNum: 10
},
methods: {
	randomIndex: function () {
		return Math.floor(Math.random() * this.items.length)
	},
	add: function () {
		this.items.splice(this.randomIndex(), 0, this.nextNum++)
	},
	remove: function () {
		this.items.splice(this.randomIndex(), 1)
	}
}</pre>

	<pre>.list-item {
  display: inline-block;
  margin-right: 10px;
}
.list-enter-active, .list-leave-active {
  transition: all 1s;
}
.list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
  opacity: 0;
  transform: translateY(30px);
}</pre>

	<div>
		<list-transitions class="vue-component-root row" />
	</div>

	<p>The only issue with the previous example is that when an item is removed, the others around it instantly snap into place instead of a smooth transition.</p>


	<h4><a href="https://vuejs.org/v2/guide/transitions.html#List-Move-Transitions">List Move Transitions</a></h4>

	<p><code>&lt;transition-group&gt;</code> component has another trick up its sleeve: it can also animate changes in position in addendum to entering/leaving. This is accomplished using the new <code>v-move</code> class, which is added when items are changing positions. Like other classes the prefix will match the value of a provided <code>name</code> attribute, allowing a manually specified class with the <code>move-class</code> attribute.</p>

	<pre>&lt;div&gt;
	&lt;button v-on:click="shuffle"&gt;Shuffle&lt;/button&gt;
	&lt;transition-group name="flip-list" tag="ul"&gt;
		&lt;li v-for="item in items" v-bind:key="item"&gt;
			{<span style="width:0px"></span>{ item }}
		&lt;/li&gt;
	&lt;/transition&gt;
&lt;/div&gt;</pre>

	<pre>...,
data: {
	items: [1,2,3,4,5,6,7,8,9,10]	
},
methods: {
	shuffle: function () {
		this.items = shuffle(this.items)
	}	
}</pre>

	<pre>.flip-list-move {
	transition: transform 1s;
}</pre>


	<div>
		<list-move-transitions class="vue-component-root row" />
	</div>

	<p>Combining both of the previous examples makes for pretty smooth list manipulations and transitions. This may seem magical, but under the hood Vue is using an anmiation technique called FLIP.</p>

	<div>
		<list-moves-and-transitions class="vue-component-root row" />
	</div>


    <div class="alert alert-danger">
        <p>FLIP transitions do not work with elements set to <code>display: inline</code>. As an alterative, use <code>display: inline-block</code> or place the elements in a flex context.</p>
    </div>

    <p>FLIP animations are not limited to a single axis. A multidimensional grid can be transitioned too.</p>

    <h4><a href="https://vuejs.org/v2/guide/transitions.html#Staggering-List-Transitions">Staggering List Transitions</a></h4>

    <p>By communicating with JavaScript transitions through data-attributes it's possible to stagger transitions in a list:</p>

    <pre>&lt;div&gt;
    &lt;input v-model="query"&gt;
    &lt;transition-group
        name="staggered-fade"
        tag="ul"
        v-bind:css="false"
        v-on:before-enter="beforeEnter"
        v-on:enter="enter"
        v-on:leave="leave"
    &gt;
        &lt;li
            v-for="(item, index) in computedList"
            v-bind:key="item.msg"
            v-bind:data-index="index"
        &gt;{<span style="width:0px"></span>{ item.msg }}&lt;/li&gt;
    &lt;/transition-group&gt;
&lt;/div&gt;</pre>

    <pre>...,
data() {
    return {
        query: '',
        list: [
            { msg: 'Bruce Lee'},
            { msg: 'Jackie Chan'},
            { msg: 'Chuck Norris'},
            { msg: 'Jet Li'},
            { msg: 'Kung Fury'},
        ]
    }
},
computed: {
    computedList: function () {
        var vm = this;
        return this.list.filter(function (item) {
            return item.msg.toLowerCase().indexOf(vm.query.toLowerCase()) !== -1
        });
    }
},
methods: {
    beforeEnter: function (el) {
      el.style.opacity = 0
      el.style.height = 0
    },
    enter: function (el, done) {
      var delay = el.dataset.index * 150
      setTimeout(function () {
        Velocity(
          el,
          { opacity: 1, height: '1.6em' },
          { complete: done }
        )
      }, delay)
    },
    leave: function (el, done) {
      var delay = el.dataset.index * 150
      setTimeout(function () {
        Velocity(
          el,
          { opacity: 0, height: 0 },
          { complete: done }
        )
      }, delay)
    }   
}</pre>

    <div>
        <staggered-list-transition class="vue-component-root row" />
    </div>

    <h3><a href="https://vuejs.org/v2/guide/transitions.html#Reusable-Transitions">Reusable Transitions</a></h3>

    <p>Transitions can be reused through Vue's component system. To create a reusable transition, place a <code>&lt;transition&gt;</code> or <code>&lt;transition-group&gt;</code> component at the root then pass any children into the template component.</p>

    <h4>Example with a Template Component</h4>

    <div>
        <reused-transition class="vue-component-root row" />
    </div>

    <h4>Example with a Functional Component</h4>

    <p class="lead">TODO</p>

    <h3><a href="https://vuejs.org/v2/guide/transitions.html#Dynamic-Transitions">Dynamic Transitions</a></h3>

    <p>Even transitions in Vue are data-driven. The most basic example binds the <code>name</code> attribute to a dynamic property.</p>

    <pre>&lt;transition v-bind:name="transitionName"&gt;
    ...
&lt;/transition&gt;</pre>

    <p>This is useful when CSS transitions/animations have been defined using Vue's transition class conventions and the goal is to switch between implementations.</p>

    <p>Any transition attribute can be dynamically bound, and not only attributes but also event hooks. This allows transitions to access any data in the context.</p>

    <div>
        <dynamic-transition class="vue-component-root row" />
    </div>

</section>