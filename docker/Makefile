include .env

.PHONY: build start stop log nginx php mysql node

build:
	docker-compose --file docker-compose-${APP_ENV}.yml build

start:
	docker-compose --file docker-compose-${APP_ENV}.yml up -d

stop:
	docker-compose --file docker-compose-${APP_ENV}.yml stop

log:
	docker-compose --file docker-compose-${APP_ENV}.yml logs -f

nginx:
	docker exec -it ${APP_NAME}_nginx bash

php:
	docker exec -it ${APP_NAME}_php_fpm bash

mysql:
	docker exec -it ${APP_NAME}_mysql bash

node:
	docker exec -it ${APP_NAME}_node bash
