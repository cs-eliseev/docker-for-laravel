English | [Русский](https://github.com/cs-eliseev/docker-for-laravel/blob/master/README.ru_RU.md)

DOCKER FOR LARAVEL
=======

[![Packagist](https://img.shields.io/packagist/l/cse/helpers-ip.svg?style=flat-square)](https://github.com/cs-eliseev/docker-for-laravel/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/docker-for-laravel.svg?style=flat-square)](https://github.com/cs-eliseev/docker-for-laravel/archive/master.zip)


## Description

Simple environment for laravel project, based on laradock.

## Info

* Laravel application: http://localhost

### External ports

|Service|Port|
|:---|:---:|
|HTTP|80|
|HTTPS|443|
|Redis WebUI|6007|
|Echo Server|7102|
|Socket|7103|
|Mailhog|8025|
|XDebug|9003|
|Swagger Editor|5151|
|Swagger WebUI|5555|

## Usage

### I - Install

#### Git

Clone this repository locally:
```bash
git clone https://github.com/cs-eliseev/docker-for-laravel.git
```

#### Download

[Download the latest release here](https://github.com/cs-eliseev/docker-for-laravel/archive/master.zip).

### II - Install Docker

* Install [docker](https://docs.docker.com/engine/installation/)
* Install [docker-compose](https://docs.docker.com/compose/install/)

### III - Import dependency

1. Import laradock

   ```shell
   git clone https://github.com/laradock/laradock.git dockers
   ```

### VI - Import laravel project

Laravel config example: `.env.example-for-laravel`

1. Import example project: laravel for docker

   ```shell
   git clone https://github.com/cs-eliseev/laravel-for-docker-example.git src
   ```

2. Create a new Laravel project to Docker

    ```shell
    composer create-project --prefer-dist laravel/laravel src
    ```

3. Git clone project to Docker

    ```shell
    git clone <link> src
    ```

### V - Add config

   ```shell
   cp .env.example .env
   ```

### VI - BUILD

   ```shell
   docker-composer up -d --build
   ```

## Paths

1. Laravel project path
```
./src
```

2. Environment path
```
.env
```

3. Logs path

```
./logs
```

4. Laradock containers path

```
./dockers
```

5. Containers settings path

```
./configs
```

## Docker containers

|Service|Container name|
|:---|:---:|
|Application|laravel-workspace|
|Nginx|laravel-nginx|
|PHP-FPM|laravel-php-fpm|
|Cron|laravel-cron|
|Horizon|laravel-horizon|
|MySQL|laravel-mysql|
|Mongo|laravel-mongo|
|Redis|laravel-redis|
|Memcached|laravel-memcached|
|Laravel Echo Server|laravel-echo|
|Soketi|laravel-socket|
|Mailhog|laravel-mailhog|
|Redis WebUI|laravel-redis-ui|
|Swagger WebUI|laravel-swagger-ui|
|Swagger Editor|laravel-swagger-editor|

## Settings

All settings in the file `.env`

### General settings:

|Key|Info|
|:---|:---|
|APP_NAME|Application name|
|PATH_DOCKER|Laradock files path|
|PATH_CONFIGS|Containers config path|
|PATH_LOGS|Containers log path|
|DATA_PATH_HOST|Containers data path|
|APP_CODE_PATH_HOST|Application path|
|APP_CODE_PATH_CONTAINER|Container application path|
|PHP_VERSION|PHP version|

### Ports settings:

|Key|Info|
|:---|:---|
|NGINX_HOST_HTTP_PORT|HTTP port|
|NGINX_HOST_HTTPS_PORT|HTTPS port|
|NGINX_PHP_UPSTREAM_PORT|Nginx upstream port|
|MYSQL_PORT|Mysql port|
|REDIS_PORT|Redis port|
|MEMCACHED_HOST_PORT|Memcached port|
|MONGODB_PORT|MongoDB port|
|LARAVEL_ECHO_SERVER_PORT|Echo server port|
|SOKETI_PORT|Soketi port|
|SOKETI_METRICS_SERVER_PORT|Soketi metrics port|
|MAILHOG_SMTP_PORT|Mailhog smtp port|
|MAILHOG_HTTP_PORT|Mailhog http port|
|SWAGGER_UI_PORT|Swagger WebUI port|
|SWAGGER_EDITOR_PORT|Swagger editor port|
|REDIS_WEBUI_PORT|Redis WebUI port|
|REDIS_WEBUI_CONNECT_PORT|Redis WebUI connect port|
|PHP_FPM_XDEBUG_PORT|XDebug port|

## Container commands

1. Build container

   ```shell
   docker-composer up -d --build
   ```

2. Star containers

   ```shell
   docker-composer start
   ```

3. Stop containers

   ```shell
   docker-composer stop
   ```

4. Show run containers

   ```shell
   docker ps
   ```

5. Show all containers

   ```shell
   docker ps -a
   ```

6. Connect application container

   ```shell
   docker exec -it laravel-workspace bash
   ```

7. Docker logs

   ```shell
   docker logs <container_name>
   ```

## License

The DOCKER FOR LARAVEL set of settings and configurations licensed under the MIT license. Please see [License File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/LICENSE.md) for more information.

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)