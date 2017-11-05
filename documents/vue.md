# Vue JS
The Front-End Components will be built using [Vue.js](https://vuejs.org/v2/guide/index.html).

## Components
The key to Vue Component Parent <-> Child relationship is [props down, events up](https://vuejs.org/v2/guide/components.html#Composing-Components).

All Vue applications start with a root component. Within that root component can be any number of sub-components.

### Registering Components

A component can be registered globally or locally. Once registered a component can be used in an instance's template as a custom element `<my-component></my-component>`.

#### Global Registration

* Register a component globally using `Vue.component(tagName, options)`

#### Local Registration

A component can be limited in availability within the scope of another instance/component by registering it with the `components` option.

#### Component Attributes

**`data` must be a function returning an object.

|Function   |Description
|---|---|
|`v-bind:xxxx="yyyy"`<br />Shorthand = `:xxx="yyy"`   | binds the node's xxxx attribute to the data value yyyy, if that value is updated then the node will re-render
|`v-if="xxxx"`   | only displays the node if the condition is satisfied
|`v-for="x in xs"`   | for loop
|`v-on:someEvent="someResponse"`<br />`v-on:click="counter += 1"`<br />Shorthand = `@someEvent="xxxxx"` like `@click="doSomething"`   | attach an action to an event such as click
|`v-model="someModel"`   | two-way binding between form input and app state
|`<tr is="my-component">...</tr>`   | to prevent DOM parsing errors us the is attribute (recommended for content of `table`, `ol`, `ul`, `select`)

NOTE: Very particular about naming conventions. Props must be camel case, and used as camel case in the template:

```
props: ['myMessages']
...
template: '....{{myMessage }}
```

but their markup must be kebab-case `<child my-message="something"></child>`.

