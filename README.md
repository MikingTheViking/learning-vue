#Learning Vue.js
##with Laravel & Docker-Compose


#1. Project Configuration

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

#####Makefile
The Makefile is used to configure and prepare MAKE commands - rapidly simplifying development, testing, and build processes. It can be used to execute many CLI commands in rapid succession via a simple MAKE command such as `make dev-server`.

#####Dockerfile
The root Dockerfile contains the docker configuration commands for the Ubuntu container.

#####docker-compose.yml
The docker compose file is used to provide configuration details for the various docker containers used in the application (in this case the postgres container and the ubuntu container) with various details like such as:

* port mapping
* file system volume mapping (./src:/src)
* build context (.)
* Dockerfile to use
* docker image to use

####config
The config folder contains configurations for both nginx and supervisord.

Supervisord is used for client/server process management (managing the NGINX container such as if it were to die). NGINX is used in the container as a web server.

####postgres
The postgres folde contains the Dockerfile to configure the postgres docker container and an `init.sql` file to initialize the database.

