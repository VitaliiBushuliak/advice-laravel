## Images

- [nginx:1.23](https://hub.docker.com/_/nginx)
- [php:8.1-fpm](https://hub.docker.com/_/php)
- [mysql:8.0](https://hub.docker.com/_/mysql)
- [node:18.6](https://hub.docker.com/_/node)

## Setup

- `cp docker/.env.example docker/.env`
- `cp src/.env.example src/.env`
- `cd docker`
- `make start`
- `make php`
- `php artisan migrate --seed`
- `php artisan key:generate`
- `exit`
- `make node`
- `npm install`
- `npm run dev`
- `exit`

## Commands

- `make build`
- `make start`
- `make stop`
- `make log`
- `make nginx`
- `make php`
- `make mysql`
- `make node`
