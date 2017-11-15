# Learning Vue.js
## with Laravel & Docker-Compose

### Relevant Subdocumentation
* [Markdown](documents/markdown.md)
* [Docker & Docker-Composer](documents/docker-docker-composer.md)
* [Vue](documents/vue.md)
* [Laravel](documents/laravel.md)

## Project Configuration

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

### Makefile
The Makefile is used to configure and prepare MAKE commands - rapidly simplifying development, testing, and build processes. It can be used to execute many CLI commands in rapid succession via a simple MAKE command such as `make dev-server`.

### Dockerfile
The root Dockerfile contains the docker configuration commands for the Ubuntu container.

### docker-compose.yml
The docker compose file is used with docker-compose to deploy multiple containers,providing configuration details for several containers used in the application (in this case the postgres container and the ubuntu container) with various details like such as:

* port mapping
* file system volume mapping (./src:/src)
* build context (.)
* Dockerfile to use
* docker image to use

### config
The config folder contains configurations for both nginx and supervisord.

Supervisord is used for client/server process management (managing the NGINX container such as if it were to die). NGINX is used in the container as a web server.

### postgres
The postgres folde contains the Dockerfile to configure the postgres docker container and an `init.sql` file to initialize the database.


##Setting Up the Project

Clone the project from the repo.

### Initial Building and Installations

If you are freshly cloning this repo locally you'll need to complete several steps to get it up and running.

1. In the project root (`Makefile` location)
  * run `make build` to create the containers (postgres and ubuntu)
  * run `make up` to start up the containers
  * run `make storage_link` to create a link from the storage to the public directory
  * ....run `make halt` to stop the containers
2. In `src/`
  * run `yarn` to install all node dependencies

### For Development

* run `yarn dev` to transpile a development build of the source code
* run `yarn watch` to transpile a development build of the source code, and watch the files for changes with live reload