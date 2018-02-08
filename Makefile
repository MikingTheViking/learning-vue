.PHONY: help

help_markdown:
	@egrep '^[a-zA-Z_-]+:.*?## .*$$' Makefile | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "## `make %s`\n\n%s\n\n", $1, $2}'

help: # Print out target list.
	@egrep '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

.DEFAULT_GOAL := help

up: ## turn on the docker containers for docker-compose up -d nginx mysql redis beanstalkd
	cd laradock && docker-compose up -d nginx mysql redis beanstalkd

stop: ## stop the docker containers docker-compose stop -d nginx mysql redis beanstalkd
	cd laradock && docker-compose stop

docker_clean: ## Remove exited docker containers and dangling images.
	@docker rm $$(docker ps -aq 2>/dev/null) 2>/dev/null || true
	@docker rm -v $$(docker ps --filter status=exited -q 2>/dev/null) 2>/dev/null || true
	@docker rmi $$(docker images --filter dangling=true -q 2>/dev/null) 2>/dev/null || true


clean: ## Stop and remove running containers, and localy built image
	@make stop
	cd laradock && docker-compose  rm -f
	docker rmi dev 2>/dev/null || true
	@make docker_clean


shell: ## access workspace shell
	cd laradock && docker-compose exec workspace bash


first_time_install: ## run first time installation
	@make copy_env
	@make composer_install
	@make generate_key
	#@make storage_link
	@make yarn_install
	@make rollback
	@make seed

copy_env: ## copy the laravel_project/.env.example to laravel_project/.env
	cd laravel_project && cp .env.example .env

generate_key: ## generate laravel application key
	cd laradock && docker-compose exec workspace php artisan key:generate

storage_link: ## creates symbolic link from storage to public directory
	cd laradock && docker-compose exec workspace php artisan storage:link

yarn_install: ## run yarn install for dev dependencies
	cd laravel_project && yarn

composer_install: ## install composer dependencies
	cd laradock && docker-compose exec workspace composer install

composer_dumpauto:	## run composer dump autoload
	cd laradock && docker-compose exec workspace composer dumpautoload


migrate: ## run db migrate
	cd laradock && docker-compose exec workspace php artisan migrate

rollback: ## run db rollback
	cd laradock && docker-compose exec workspace php artisan migrate:fresh

seed: ## run db seed
	cd laradock && docker-compose exec workspace php artisan db:seed


test: ## run phpunit
	cd laradock && docker-compose exec workspace vendor/bin/phpunit

tail: ## get the logs as they come
	tail -F laravel_project/storage/logs/*

dev: ## run a dev build
	cd laravel_project && yarn dev

prod: ## run a prod build
	cd laravel_project && yarn prod

watch: ## watch the project files cd laravel && yarn watch
	cd laravel_project && yarn watch

