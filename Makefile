COMPOSE_OPTS := "-p learnvue"
APP_CONTAINER := "learnvue_webdev_1"

new: ## Create and start containers, install dependencies and build assets.
	@make up
	@make composer_install
	@make db_migrate
	@make db_seed

composer_install: ## Install composer dependencies.
	@docker exec ${APP_CONTAINER} bash -c "cd /src && composer install --no-interaction"

composer_dumpauto: ## Install composer dependencies.
	@docker exec ${APP_CONTAINER} bash -c "cd /src && composer dump-autoload"

db_migrate: ## Migrate the database.
	@docker exec ${APP_CONTAINER} bash -c "cd /src && php artisan migrate"

db_rollback: ## Rollback latest migration.
	@docker exec ${APP_CONTAINER} bash -c "cd /src && php artisan migrate:fresh"

db_seed: ## Seed the database.
	@docker exec ${APP_CONTAINER} bash -c "cd /src && php artisan db:seed"

rebuild: ## Rebuild the container from scratch
	@make halt
	@make clean
	@make build-no-cache
	@make up
	@make new

storage_link: ## creates symbolic link from storage to public directory
	@docker exec ${APP_CONTAINER} bash -c "cd /src && php artisan storage:link"

up: ## Create and start containers.
	@docker-compose ${COMPOSE_OPTS} up -d

halt: ## Stop running containers.
	@docker-compose ${COMPOSE_OPTS} stop

clean: ## Stop and remove running containers, and localy built nep-dev image.
	@make halt
	@docker-compose ${COMPOSE_OPTS} rm -f
	@docker rmi dev 2>/dev/null || true
	@make docker_clean

docker_clean: ## Remove exited docker containers and dangling images.
	@docker rm $$(docker ps -aq 2>/dev/null) 2>/dev/null || true
	@docker rm -v $$(docker ps --filter status=exited -q 2>/dev/null) 2>/dev/null || true
	@docker rmi $$(docker images --filter dangling=true -q 2>/dev/null) 2>/dev/null || true

shell: ## Open a shell in the app container.
	@docker exec -it ${APP_CONTAINER} /bin/bash

build: ## Force rebuild of nep-webdev-image
	@docker-compose ${COMPOSE_OPTS} build

build-no-cache: ## Force rebuild of nep-webdev-image
	@docker-compose ${COMPOSE_OPTS} build --no-cache

test_unit: ## Execute unit tests via PHPUnit
	@docker exec ${APP_CONTAINER} bash -c "cd /src && /src/vendor/bin/phpunit"

test: ## Execute all tests
	@make test_unit

tail: ## Tail Laravel logs.
	@docker exec -it ${APP_CONTAINER} bash -c "tail -F /src/storage/logs/*"

.PHONY: help

help_markdown:
	@egrep '^[a-zA-Z_-]+:.*?## .*$$' Makefile | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "## `make %s`\n\n%s\n\n", $1, $2}'

help: # Print out target list.
	@egrep '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

.DEFAULT_GOAL := help