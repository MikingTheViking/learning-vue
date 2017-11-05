# Learning Vue.js
## with Laravel & Docker-Compose

[Markdown](documents/markdown.md)
[Docker & Docker-Compose](documents/docker-docker-compose.md)
[Vue](documents/vue.md)
[Laravel](documents/laravel.md)

# 1. Project Configuration

We'll setup this project with Docker containers: a container for the database, and a second container for the server (Ubuntu in this case).

```
.
+-- Makefile
+-- Dockerfile
+-- docker-compose.yml
+-- config
|   +-- nginx-dev.conf
|   +-- supervisord-web-dev.conf
+-- postgres
|   +-- scripts
|   |   +-- init.sql
|   +-- Dockerfile
+-- src
|   [LARAVEL + Application SOURCE FILES]
```

##### Makefile
The Makefile is used to configure and prepare MAKE commands - rapidly simplifying development, testing, and build processes. It can be used to execute many CLI commands in rapid succession via a simple MAKE command such as `make dev-server`.

##### Dockerfile
The root Dockerfile contains the docker configuration commands for the Ubuntu container.

##### docker-compose.yml
The docker compose file is used to provide configuration details for the various docker containers used in the application (in this case the postgres container and the ubuntu container) with various details like such as:

* port mapping
* file system volume mapping (./src:/src)
* build context (.)
* Dockerfile to use
* docker image to use

#### config
The config folder contains configurations for both nginx and supervisord.

Supervisord is used for client/server process management (managing the NGINX container such as if it were to die). NGINX is used in the container as a web server.

#### postgres
The postgres folde contains the Dockerfile to configure the postgres docker container and an `init.sql` file to initialize the database.

# Laravel 5.5
[Laravel](https://laravel.com/) is a very intuitive PHP Framework that will act as the core framework of this application.

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

