<section title="State Management">

    <h3><a href="https://vuejs.org/v2/guide/state-management.html">State Management</a></h3>

    <h4><a href="https://vuejs.org/v2/guide/state-management.html#Simple-State-Management-from-Scratch">Simple State Management From Scratch</a></h4>

    <p>An often overlooked <em>source of truth</em> in a Vue app is the raw <code>data</code> object. A Vue instance only proxies to it: therefore if a piece of stateneeds to be shared by multiple instances, it can be shared by identity:</p>

    <pre>const sourceOfTruth = {}
const vmA = new Vue({
  data: sourceOfTruth
})
const vmB = new Vue({
  data: sourceOfTruth
})</pre>

    <p>Whenever <code>sourceOfTruth</code> is mutated both <code>vmA</code> and <code>vmB</code> will automatically update their views. Subcomponents within each of these instances would laos have access via <code>this.$root.$data</code>.</p>

    <p>This would make debugging a nightmare as any piece of data could be changed by any part of the app at any time without leaving a trace. To solve this issue there is a <strong>store</strong> pattern:</p>

    <pre>var store = {
  debug: true,
  state: {
    message: 'Hello!'
  },
  setMessageAction (newValue) {
    if (this.debug) console.log('setMessageAction triggered with', newValue)
    this.state.message = newValue
  },
  clearMessageAction () {
    if (this.debug) console.log('clearMessageAction triggered')
    this.state.message = ''
  }
}</pre>

    <p>All actions that mutate the store's <code>state</code> are put inside the store itself. Furthermore, each instance/component can still own and manae its own private state:</p>

    <pre>var vmA = new Vue({
  data: {
    privateState: {},
    sharedState: store.state
  }
})
var vmB = new Vue({
  data: {
    privateState: {},
    sharedState: store.state
  }
})</pre>

    <img src="images/state.png"/>

    <div class="alert alert-warning">
        <p>It's important to note to <strong>never</strong> replace the original state object in your actions - the components and the store need to share reference to the same object in order for mutations to be observed.</p>
    </div>

    <p>Applying the convention where components do not directly mutate state that belongs to a store, but instead dispatch events that notify the store to perform actions, leads to the <a href="Flux">Flux</a> architecture.</p>

    <h2><a href="https://vuex.vuejs.org/en/intro.html">Vuex</a></h2>
    <p><small><a href="https://github.com/vuejs/vuex">Vuex GitHub</a></small></p>
    <p><small><a href="https://vuex.vuejs.org/en/">Vuex Documentation</a></small></p>



    <p>State management in Vue is best accomplished using <a href="https://vuex.vuejs.org/en/intro.html">Vuex</a>. Vuex is a <strong>state management pattern + library</strong> that serves as a centralized store for all the components in the app. Vuex contains rules that ensure state can only be mutated in a predictable fashion and is easy to debug as it integrates with Vue's official devtools enabling advanced features like zero-config time-travel debugging and state snapshot export/import.</p>

    <h3><a href="https://vuex.vuejs.org/en/intro.html">State Management Pattern?</a></h3>
    
    <p>Consider a simple Vue counter app, there are 3 parts of the app:</p>

    <ul>
      <li>the <strong>state</strong>, which is the source of truth that drives the app</li>
      <li>the <strong>view</strong>, which is just a declarative mapping of the <strong>state</strong></li>
      <li>the <strong>actions</strong>, which are the possible ways the state could change in reaction to user inputs from the <strong>view</strong></li>
    </ul>

    <pre>new Vue({
  // state
  data () {
    return {
      count: 0
    }
  },
  // view
  template: `
    <div>{<span></span>{ count }}</div>
  `,
  // actions
  methods: {
    increment () {
      this.count++
    }
  }
})</pre>

  <p>An overly simplified representation of the concept of "one-way data flow":</p>

  <img src="images/flow.png" />

  <p>Naturally this quickly breaks down when there are <strong>multiple components that share common state</strong>:</p>

  <ul>
    <li>Multiple views may depend on the same piece of state. Passing props can be tedious for deeply nested components and essentially doesn't work for sibling components.</li>
    <li>Actions from different views may need to mutate the same piece of state. Often the solutions involve direct referencing parent/child instances or trying to mutate and synchronize multiple state copies via events. Both patterns are brittle and quickly lead to unmaintainable code. </li>
  </ul>

	<p>The idea of state management is to extract all shared state out of components and manage it in a global singleton. The component tree becomes a big "view", and any component can access the state or trigger actions from anywhere in the tree.</p>

	<p>This is the basic idea for Vuex, inspired by Flux, Redux and The Elm Architecture. Although unlike other patterns, Vuex is tailored specifically for Vue.js to take advantage of its granular reactivity system for efficient updates.</p>

	<img src="images/vuex.png" />

	<hr>

	<h3><a href="https://vuex.vuejs.org/en/getting-started.html">Getting Started</a></h3>

	<p>Every Vuex application is comprised of a <strong>store</strong>; a container that holds the applications <strong>state</strong>. Vuex stores differ from plain global objects by:</p>

	<ol>
		<li>Vuex stores are reactive. When Vue components retrieve state from it, they will reactively and efficiently update if the store's state changes.</li>
		<li>A store's state cannot be direcetly mutated. The only way to change a store's state is by explicitly <strong>committing mutations</strong>. This ensures that every state changes leaves a track-able record, enabling tooling that is better to understand the application.</li>
	</ol>
  
	<p><strong>TODO: Learn <a href="https://babeljs.io/learn-es2015/">ES2015</a></strong></p>

	<blockquote>
		<strong>NOTE:</strong> This section will use ES2015 syntax!
	</blockquote>

	<h4>Creating a Store</h4>
	
	<p>Creating a store is easy: justprovide an intiial state object and some mutations:</p>

	<pre>// Make sure to call Vue.use(Vuex) first if using a module system

const store = new Vuex.Store({
  state: {
    count: 0
  },
  mutations: {
    increment (state) {
      state.count++
    }
  }
})</pre>

	<p>The state object is now accessible as <code>store.state</code>, and can trigger a state change with the <code>store.commit</code> method:</p>

	<pre>store.commit('increment')

console.log(store.state.count) // -> 1</pre>

	<h3><a href="https://vuex.vuejs.org/en/core-concepts.html">Core Concepts</a></h3>


	<h4><a href="https://vuex.vuejs.org/en/state.html">State</a></h4>

	<h5>Single State Tree</h5>

	<p>Vuex uses a <strong>single state tree</strong>, one object the contains all the application level state and serves as the single source of truth. Usually there is a single store for each application, although this does not conflict with modularity. Later it will be shown how to split state and mutations into sub modules.</p>

	<h5>Vuex State into Vue Components</h5>	

	<p>The simplest way to retrieve state from a Vuex store insde a Vue component is from within a <strong>Computed Property</strong>:</p>

	<pre>// let's create a Counter component
const Counter = {
  template: `<div>{<span></span>{ count }}</div>`,
  computed: {
    count () {
      return store.state.count
    }
  }
}</pre>

	<p>When <code>store.state.count</code> changes, it will cause the computed property to re-evaluate, and triger associated DOM updates.</p>

	<p>This pattern causes the component to rely on the global store singleton. With a modular system, it requires importing the store in every component that uses store state, and also requires mocking when testing the component.</p>

	<p>Vuex has a mechanism to inject the store into all child components from the root component with the <code>store</code> option enabled by <code>Vue.use(Vuex)</code>.</p>

	<pre>const app = new Vue({
  el: '#app',
  // provide the store using the "store" option.
  // this will inject the store instance to all child components.
  store,
  components: { Counter },
  template: `
    &lt;div class="app"&gt;
      &lt;counter /&gt;
    &lt;/div&gt;
  `
})</pre>


	<p>Providing the <code>store</code> option to the root instance causes it to be injected into all child components of the root and will be available on them as <code>this.$store</code>. Updating the previous <code>Counter</code>:</p>

	<pre>const Counter = {
  template: `&lt;div&gt;{<span></span>{ count }}&lt;/div&gt;`,
  computed: {
    count () {
      return this.$store.state.count
    }
  }
}</pre>

	<h5>The <code>mapState</code> Helper</h5>

	<p>When a component needs to make use of multiple store state properties or getters. It can get verbose repetitively declaring all the computed properties. Using the <code>mapState</code> helper generates computed getter functions!</p>

	<pre>// in full builds helpers are exposed as Vuex.mapState
import { mapState } from 'vuex'

export default {
  // ...
  computed: mapState({
    // arrow functions can make the code very succinct!
    count: state => state.count,

    // passing the string value 'count' is same as `state => state.count`
    countAlias: 'count',

    // to access local state with `this`, a normal function must be used
    countPlusLocalState (state) {
      return state.count + this.localCount
    }
  })
}</pre>


	<p>Alternatively, a string array can be passed to <code>mapState</code> when the name of a mapped computed property is the same as a state sub tree name.</p>

	<pre>computed: mapState([
  // map this.count to store.state.count
  'count'
])</pre>

	<h5>Object Spread Operator</h5>

	<p><code>mapState</code> returns an object. Normally to use it with other local computed properties it'd require merging multiple objects into one to pass the final object to <code>computed</code>. But using the <a>object spread operator</a> (stage-3 ECMAScript proposal). The object spread operator returns eachkey in the object or array as a comma-separated spread (like a JSON object definition).</p>

	<pre>function f(x, y, z) {
  return x + y + z;
}
// Pass each elem of array as argument
f(...[1,2,3]) == 6</pre>

	<pre>computed: {
  localComputed () { /* ... */ },
  // mix this into the outer object with the object spread operator
  ...mapState({
    // ...
  })
}</pre>

	<h5>Components Can Still Have Local State</h5>

	<p>Not all state belongs in the Vuex, the necessity must be weighed in each case.</p>

	<h4><a href="https://vuex.vuejs.org/en/getters.html">Getters</a></h4>

	<p>Sometimes there arises a need to compute derived state based on store state, such as filtering through a list of items and counting them:</p>

	<pre>computed: {
  doneTodosCount () {
    return this.$store.state.todos.filter(todo => todo.done).length
  }
}</pre>

	<p>If more than one component needs to make use of this, te function must either be duplicated, or extracted into a shared helper and imported into multiple places - both are less than ideal.</p>

	<p>Vuex allows the defining of <em>getters</em> in the store. They are similar to computed properties for stores: a getter's result is cached based on its dependecnies, and will only re-evaluate when some of its dependencies have changed.</p>

	<p>Getters will receive the state as their 1st argument:</p>

	<pre>const store = new Vuex.Store({
  state: {
    todos: [
      { id: 1, text: '...', done: true },
      { id: 2, text: '...', done: false }
    ]
  },
  getters: {
    doneTodos: state => {
      return state.todos.filter(todo => todo.done)
    }
  }
})</pre>


	<p>The getters will be exposed on the <code>store.getters</code> object:</p>

	<pre>store.getters.doneTodos // -> [{ id: 1, text: '...', done: true }]</pre>

	<p>Getters will also receive other getters as the 2nd argument:</p>

	<pre>getters: {
  // ...
  doneTodosCount: (state, getters) => {
    return getters.doneTodos.length
  }
}
store.getters.doneTodosCount // -> 1</pre>

	<p>Now the getter can be used easily inside any component:</p>

	<pre>computed: {
  doneTodosCount () {
    return this.$store.getters.doneTodosCount
  }
}</pre>

	<p>Arguments can also be passed to getters by returning a function. This is particularly useful when you want to query an array in the store:</p>

	<pre>getters: {
  // ...
  getTodoById: (state, getters) => (id) => {
    return state.todos.find(todo => todo.id === id)
  }
}
store.getters.getTodoById(2) // -> { id: 2, text: '...', done: false }</pre>


	<h5>The <code>mapGetters</code> Helper</h5>

	<p>The <code>mapGetters</code> helper maps store getters to local computed properties:</p>

	<pre>import { mapGetters } from 'vuex'

export default {
  // ...
  computed: {
    // mix the getters into computed with object spread operator
    ...mapGetters([
      'doneTodosCount',
      'anotherGetter',
      // ...
    ])
  }
}</pre>

	<p>To map a getter to a different name, use an object:</p>

	<pre>...mapGetters({
  // map `this.doneCount` to `store.getters.doneTodosCount`
  doneCount: 'doneTodosCount'
})</pre>

	<h4><a href="https://vuex.vuejs.org/en/mutations.html">Mutations</a></h4>

	<p>The only way to change state in a Vuex store is by comitting a mutation. Vuex mutations are very similar to events: each mutation hasa string <strong>type</strong> and a <strong>handler</strong>. The handler function is where actual state modifications are performed, and it will receive the state as the first argument:</p>

	<pre>const store = new Vuex.Store({
  state: {
    count: 1
  },
  mutations: {
    increment (state) {
      // mutate state
      state.count++
    }
  }
})</pre>

	<p>A mutation handler cannot be directly called, it is like an event registation. "When a mutation with the type <code>increment</code> is triggered, call this handler". To invoke a mutation handler, call <code>store.commit</code> with its type:</p>

	<pre>store.commit('increment')</pre>

	<h5>Commit with Payload</h5>

	<p>Additional arguments can be passed to <code>store.commit</code>, which is called the <strong>payload</strong> for the mutation:</p>

	<pre>// ...
mutations: {
  increment (state, n) {
    state.count += n
  }
}
store.commit('increment', 10)</pre>

	<p>The payload should be an object so that it can contain multiple fields, and the recorded mutation will also be more descriptive:</p>

	<pre>// ...
mutations: {
  increment (state, payload) {
    state.count += payload.amount
  }
}
store.commit('increment', {
  amount: 10
})</pre>


	<h5>Object-Style Commit</h5>

	<p>An alternative way to commit a mutation is by directly using an object that has a <code>type</code> property:</p>

	<pre>store.commit({
  type: 'increment',
  amount: 10
})</pre>

	<p>When using object-style commit, the entire object will be passed as the payload to mutation handlers, so the handler remains the same:</p>

	<pre>mutations: {
  increment (state, payload) {
    state.count += payload.amount
  }
}</pre>

	<h5>Mutations Follow Vue's Reactivity Rules</h5>

	<p>Vuex store's state is made reactive by Vue. When the state is mutated, Vue components observing the state will update automatically. This means Vuex mutations are subject to the sam reactivity caveats when working with plain Vue:</p>

	<ol>
		<li>Initializing the store's initial state with all desired fields upfront.</li>
		<li>When adding new properties to an Object, either:</li>
		<ul>
			<li>Use <code>Vue.set(obj, 'newProp', 123), or</code></li>
			<li>Replace that Object with a fresh one, such as using the stage-3 object spread syntax:
			<pre>state.obj = { ...state.obj, newProp: 123 }</pre>
			</li>
		</ul>
	</ol>

	<h5>Using Constants for Mutation Types</h5>

	<p>A common pattern is to use constants for mutation types in various Flux implementations. This provides an easy at-a-glance view of the possible mutations in the entire application.</p>

	<pre>// mutation-types.js
export const SOME_MUTATION = 'SOME_MUTATION'
// store.js
import Vuex from 'vuex'
import { SOME_MUTATION } from './mutation-types'

const store = new Vuex.Store({
  state: { ... },
  mutations: {
    // we can use the ES2015 computed property name feature
    // to use a constant as the function name
    [SOME_MUTATION] (state) {
      // mutate state
    }
  }
})</pre>

	<p>Using constants is largely a preference - helpful to large projects with many developers, but entirely optional.</p>

	<h5>Mutations Must Be Synchronous</h5>

	<p><strong>Mutation handler functions must be synchronous</strong>. This ensures that all action/reactions are traceable.</p>

	<h5>Committing Mutations in Components</h5>

	<p>Mutations in Components can be committed using <code>this.$store.commit('xxx')</code> or by using the <code>mapMutations</code> helper which maps component methods to <code>store.commit</code> calls (requires the root <code>store</code> injection).</p>

	<pre>import { mapMutations } from 'vuex'

export default {
  // ...
  methods: {
    ...mapMutations([
      'increment', // map `this.increment()` to `this.$store.commit('increment')`

      // `mapMutations` also supports payloads:
      'incrementBy' // map `this.incrementBy(amount)` to `this.$store.commit('incrementBy', amount)`
    ]),
    ...mapMutations({
      add: 'increment' // map `this.add()` to `this.$store.commit('increment')`
    })
  }
}</pre>


	<h5>On To Actions</h5>

	<p>Asynchronocity combined with state mutation can make a program hard to reason about. Given two asynchronous methods with callbacks that mutate state, it's hard to determine the chronological ordering of events. This is why <strong>mutations are synchronous transactions</strong>.</p>

	<pre>store.commit('increment')
// any state change that the "increment" mutation may cause
// should be done at this moment.</pre>

	<p>To handle asynchronous operations: Actions!</p>

	<h4><a href="https://vuex.vuejs.org/en/actions.html">Actions</a></h4>

	<p>Similar to mutations, but different in that:</p>

	<ul>
		<li>instead of mutating state, actions commit mutations</li>
		<li>actions can contain arbitrary asynchronous operations</li>
	</ul>

	<p>Registering a simple action:</p>

	<pre>const store = new Vuex.Store({
  state: {
    count: 0
  },
  mutations: {
    increment (state) {
      state.count++
    }
  },
  actions: {
    increment (context) {
      context.commit('increment')
    }
  }
})</pre>

	<p>Action handlers receive a context object exposing the same set of methods/properties on the store instance, so <code>context.comit</code> can be called to comit a mutation, or access the state and geters via <code>context.state</code> and <code>context.getters</code>. The context object is not the store instance itself, which will make sense with Modules later.</p>

	<p>In practice, use the ES2015 argument destructuring to simplify the code a bit (especially where there's a need to call <code>commit</code> multiple times):</p>

	<pre>actions: {
  increment ({ commit }) {
    commit('increment')
  }
}</pre>

	<h5>Dispatching Actions</h5>

	<p>Actions are triggered with the <code>store.dispatch</code> method:</p>

	<pre>store.dispatch('increment')</pre>

	<p>Because <strong>mutations must be synchronous</strong>, they can use the <code>store.commit('increment')</code> call. Actions can be asynchronous, so they must enqueue their mutations to state:</p>

	<pre>actions: {
  incrementAsync ({ commit }) {
    setTimeout(() => {
      commit('increment')
    }, 1000)
  }
}</pre>

	<p>Actions support the same payload format and object-style dispatch:</p>

	<pre>// dispatch with a payload
store.dispatch('incrementAsync', {
  amount: 10
})

// dispatch with an object
store.dispatch({
  type: 'incrementAsync',
  amount: 10
})</pre>

	<p>A practical real-world example of actions would be an action to checkout a shopping cart: <strong>calling an async API</strong> and <strong>committing multiple mutations</strong>:</p>

	<pre>actions: {
  checkout ({ commit, state }, products) {
    // save the items currently in the cart
    const savedCartItems = [...state.cart.added]
    // send out checkout request, and optimistically
    // clear the cart
    commit(types.CHECKOUT_REQUEST)
    // the shop API accepts a success callback and a failure callback
    shop.buyProducts(
      products,
      // handle success
      () => commit(types.CHECKOUT_SUCCESS),
      // handle failure
      () => commit(types.CHECKOUT_FAILURE, savedCartItems)
    )
  }
}</pre>

	<p>This performs a flow of asynchronous operations, and records the side effects (side mutations) of te action committing them.</p>

	<h5>Dispatching Actions in Components</h5>

	<p>Actions in components can be dispatched with <code>this.$store.dispatch('xxx')</code> or by using the <code>mapActions</code> helper which maps component methods to <code>store.dispatch</code> calls (requires the root <code>store</code> injection):</p>

	<pre>import { mapActions } from 'vuex'

export default {
  // ...
  methods: {
    ...mapActions([
      'increment', // map `this.increment()` to `this.$store.dispatch('increment')`

      // `mapActions` also supports payloads:
      'incrementBy' // map `this.incrementBy(amount)` to `this.$store.dispatch('incrementBy', amount)`
    ]),
    ...mapActions({
      add: 'increment' // map `this.add()` to `this.$store.dispatch('increment')`
    })
  }
}</pre>

	<h5>Composing Actions</h5>

	<p>Actions are often asynchronous. <code>store.dispatch</code> can handle Promise returned by the triggered action hander and it also returns Promise:</p>

	<pre>actions: {
  actionA ({ commit }) {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        commit('someMutation')
        resolve()
      }, 1000)
    })
  }
}</pre>

	<p>Now:</p>

	<pre>store.dispatch('actionA').then(() => {
  // ...
})</pre>

	<p>And also in another action:</p>

	<pre>actions: {
  // ...
  actionB ({ dispatch, commit }) {
    return dispatch('actionA').then(() => {
      commit('someOtherMutation')
    })
  }
}</pre>

	<p>Finally, if making use of async/await, actions can be composed like:</p>

	<pre>actions: {
  async actionA ({ commit }) {
    commit('gotData', await getData())
  },
  async actionB ({ dispatch, commit }) {
    await dispatch('actionA') // wait for `actionA` to finish
    commit('gotOtherData', await getOtherData())
  }
}</pre>

	<blockquote>There is a possibility that <code>store.dispatch</code> can trigger multiple action handlers in different modules. In this case the returned value will be a Promise that resolves when all triggered handlers have been resolved.</blockquote>

	<h4><a href="https://vuex.vuejs.org/en/modules.html">Modules</a></h4>

	<p>Due to using a single state tree, all state of the application is contained inside one big object. As the application grows in scale this can get severely bloated.</p>

	<p>To help with this, Vuex allows us to divide out store into <strong>modules</strong>. Each module can contain its own state, mutations, actions, getters and even nested modules:</p>

	<pre>const moduleA = {
  state: { ... },
  mutations: { ... },
  actions: { ... },
  getters: { ... }
}

const moduleB = {
  state: { ... },
  mutations: { ... },
  actions: { ... }
}

const store = new Vuex.Store({
  modules: {
    a: moduleA,
    b: moduleB
  }
})

store.state.a // -> `moduleA`'s state
store.state.b // -> `moduleB`'s state</pre>

	<h5>Module Local State</h5>

	<p>Inside a module's mutations and getters, the first argument receved will the <strong>module's local state</strong>.</p>

	<pre>const moduleA = {
  state: { count: 0 },
  mutations: {
    increment (state) {
      // `state` is the local module state
      state.count++
    }
  },

  getters: {
    doubleCount (state) {
      return state.count * 2
    }
  }
}</pre>

	<p>Inside module actions, <code>context.state</code> will expose the local state, and root state will be exposed as <code>context.rootState</code>:</p>

  <pre>const moduleA = {
  // ...
  actions: {
    incrementIfOddOnRootSum ({ state, commit, rootState }) {
      if ((state.count + rootState.count) % 2 === 1) {
        commit('increment')
      }
    }
  }
}</pre>


    <p>Inside module getters, the root state will be exposed as their 3rd argument:</p>

    <pre>const moduleA = {
  // ...
  getters: {
    sumWithRootCount (state, getters, rootState) {
      return state.count + rootState.count
    }
  }
}</pre>

  <h5>Namespacing</h5>

  <p>By default, actions, mutations, and getters inside modules are still registered under the <strong>global namespace</strong> allowing multiple modules to react to the same mutation/action type.</p>

  <p>To havea  module be more self-contained or re-usable, it can be marked as namespaced with <code>namespaced:true</code>. When the module is registered, all of its getters, actions, and mutations will be automatically namespaced based on the path the module is registered at.</p>

  <pre>const store = new Vuex.Store({
  modules: {
    account: {
      namespaced: true,

      // module assets
      state: { ... }, // module state is already nested and not affected by namespace option
      getters: {
        isAdmin () { ... } // -> getters['account/isAdmin']
      },
      actions: {
        login () { ... } // -> dispatch('account/login')
      },
      mutations: {
        login () { ... } // -> commit('account/login')
      },

      // nested modules
      modules: {
        // inherits the namespace from parent module
        myPage: {
          state: { ... },
          getters: {
            profile () { ... } // -> getters['account/profile']
          }
        },

        // further nest the namespace
        posts: {
          namespaced: true,

          state: { ... },
          getters: {
            popular () { ... } // -> getters['account/posts/popular']
          }
        }
      }
    }
  }
})</pre>

  <p>Namespaced getters and actions receive localized <code>getters</code>, <code>dispatch</code>, and <code>commit</code>. The module assets can be used without writing prefix in the same module. Toggling between namespaced or not does not affect the code inside the module.</p>

  <h5>Accessing Global Assets in Namespaced Modules</h5>

  <p>To access global state and getters, <code>rootState</code> and <code>rootGetters</code> are passed as the 3rd and 4th arguments to getter functions, and also exposed as propeties on the <code>context</code> object passed to action functions.</p>

  <p>To dispatch actions or commit mutations in the global namespace, pass <code>{root: true}</code> as the 3rd argument to <code>dispatch</code> and <code>commit</code>.</p>

  <pre>modules: {
  foo: {
    namespaced: true,

    getters: {
      // `getters` is localized to this module's getters
      // you can use rootGetters via 4th argument of getters
      someGetter (state, getters, rootState, rootGetters) {
        getters.someOtherGetter // -> 'foo/someOtherGetter'
        rootGetters.someOtherGetter // -> 'someOtherGetter'
      },
      someOtherGetter: state => { ... }
    },

    actions: {
      // dispatch and commit are also localized for this module
      // they will accept `root` option for the root dispatch/commit
      someAction ({ dispatch, commit, getters, rootGetters }) {
        getters.someGetter // -> 'foo/someGetter'
        rootGetters.someGetter // -> 'someGetter'

        dispatch('someOtherAction') // -> 'foo/someOtherAction'
        dispatch('someOtherAction', null, { root: true }) // -> 'someOtherAction'

        commit('someMutation') // -> 'foo/someMutation'
        commit('someMutation', null, { root: true }) // -> 'someMutation'
      },
      someOtherAction (ctx, payload) { ... }
    }
  }
}</pre>


  <h5>Binding Helpers with Namespace</h5>

  <p>When binding a namespaced module to components with the <code>mapState</code>, <code>mapGetters</code>, <code>mapActions</code>, and <code>mapMutations</code> helpers, it can get a bit verbose:</p>

  <pre>computed: {
  ...mapState({
    a: state => state.some.nested.module.a,
    b: state => state.some.nested.module.b
  })
},
methods: {
  ...mapActions([
    'some/nested/module/foo',
    'some/nested/module/bar'
  ])
}</pre>

  <p>In such cases, pass the module namespace string as the first argument to the helpers so that all bindings are done using that module as the context. It can be simplified to:</p>

  <pre>computed: {
  ...mapState('some/nested/module', {
    a: state => state.a,
    b: state => state.b
  })
},
methods: {
  ...mapActions('some/nested/module', [
    'foo',
    'bar'
  ])
}</pre>

  <p>Furthermore, namespaced helpers can be created by using <code>createNamespacedHelpers</code>. It returns an object having new component binding helpers that are bound with the given namespace value:</p>

  <pre>import { createNamespacedHelpers } from 'vuex'

const { mapState, mapActions } = createNamespacedHelpers('some/nested/module')

export default {
  computed: {
    // look up in `some/nested/module`
    ...mapState({
      a: state => state.a,
      b: state => state.b
    })
  },
  methods: {
    // look up in `some/nested/module`
    ...mapActions([
      'foo',
      'bar'
    ])
  }
}</pre>

  <h5>Caveat for Plugin Developers</h5>

  <p>Plugin developers may need to receive a namespace value via the plugin option in order to accomodate user namespaces.</p>

  <pre>// get namespace value via plugin option
// and returns Vuex plugin function
export function createPlugin (options = {}) {
  return function (store) {
    // add namespace to plugin module's types
    const namespace = options.namespace || ''
    store.dispatch(namespace + 'pluginAction')
  }
}</pre>

  <h5>Dynamic Module Registration</h5>

  <p>A module can be registered <strong>after</strong> the store has been created with the <code>store.registerModule</code> method:</p>

  <pre>// register a module `myModule`
store.registerModule('myModule', {
  // ...
})

// register a nested module `nested/myModule`
store.registerModule(['nested', 'myModule'], {
  // ...
})</pre>

  <p>The module's state will be exposed as <code>store.state.myModule</code> and <code>store.state.nested.myModule</code>.</p>

  <p>Dynamic module registrration makes it possible for other Vue plugins to also leverage Vuex for state management by attaching a module to the application's store. For example, the <code>vuex-router-sync</code> library integrates vue-router with vuex by managing the application's route state in a dynamically attached module.</p>

  <p>Modules can also be dynamically removed after registration with <code>store.unregisterModule(moduleName)</code>. <strong>Note:</strong> static moules cannot be removed (declared at store creation) with this method.</p>

  <p>To preserve the previous sate when registering a new module, use the <code>preserveState</code> option:</p>

  <pre>store.registerModule('a', module, { preserveState: true })</pre>

  <h5>Module Reuse</h5>

  <p>Sometimes there is a need to create multiple instances of a module, for instance:</p>

  <ul>
    <li>Creating multiple stores that use the same module (avoiding stateful singletons in the SSR when the <code>runInNewContext</code> option is <code>false</code> or <code>'once'</code>)</li>
    <li>Register the same module multiple times in the same store</li>
  </ul>

  <p>If a plain object is used to declare the state of the module, then the state object will be shared by reference and cause cross store/module state pollution when mutated.</p>

  <p>The same problem exists with <code>data</code> in Vue components. The solution is also the same: use a function for declaring module state:</p>

  <pre>const MyReusableModule = {
  state () {
    return {
      foo: 'bar'
    }
  },
  // mutations, actions, getters...
}</pre>

  <h4><a href="https://vuex.vuejs.org/en/structure.html">Applications Structure</a></h4>

  <p>Vuex doesn't restrict how code is structured, it enforces a set of high-level principles:</p>
  <div class="alert alert-light">
    <p class="lead">1. Application-level state is centralized in the store</p>

    <p class="lead">2. The only way to mutate the state is by committing <strong>mutations</strong>, which are synchronous transactions</p>

    <p class="lead">3. Asynchronous logic should be encapsulated in, and can be composed with <strong>actions</strong></p>
  </div>

	<p>An example structure for a non-trivial app leveraging modules:</p>

	<pre>├── index.html
├── main.js
├── api
│   └── ... # abstractions for making API requests
├── components
│   ├── App.vue
│   └── ...
└── store
    ├── index.js          # where we assemble modules and export the store
    ├── actions.js        # root actions
    ├── mutations.js      # root mutations
    └── modules
        ├── cart.js       # cart module
        └── products.js   # products module</pre>


	
</section>