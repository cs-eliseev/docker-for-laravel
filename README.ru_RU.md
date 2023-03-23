[English](https://github.com/cs-eliseev/helpers-ip/blob/master/README.md) | Русский

DOCKER FOR LARAVEL
=======

[![Packagist](https://img.shields.io/packagist/l/cse/helpers-ip.svg?style=flat-square)](https://github.com/cs-eliseev/docker-for-laravel/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/docker-for-laravel.svg?style=flat-square)](https://github.com/cs-eliseev/docker-for-laravel/archive/master.zip)


## Описание

Простая среда для проекта laravel, основанная на laradock.


## Информация

* Приложение Laravel доступно: http://localhost

### Внешние порты

|Сервис|Порт|
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

## Использование

### I - Установка

#### Git

Добавить этот репозиторий локально можно следующим образом:
```bash
git clone https://github.com/cs-eliseev/docker-for-laravel.git
```

#### Скачать

[Скачать последнюю версию проекта можно здесь](https://github.com/cs-eliseev/docker-for-laravel/archive/master.zip).

### II - Установка Docker

* Установка [docker](https://docs.docker.com/engine/installation/)
* Установка [docker-compose](https://docs.docker.com/compose/install/)

### III - Импорт зависимостей

1. Импорт laradock

   ```shell
   git clone https://github.com/laradock/laradock.git dockers
   ```

### VI - Импорт проекта на laravel

Пример конфига для Laravel: `.env.example-for-laravel`

1. Импорт примера проекта: laravel for docker

   ```shell
   git clone https://github.com/cs-eliseev/laravel-for-docker-example.git src
   ```

3. Создание нового Laravel проекта в Docker

    ```shell
    composer create-project --prefer-dist laravel/laravel src
    ```

4. Добавление существующего Laravel проекта в Docker

    ```shell
    git clone <link> src
    ```

### V - Добавить конфиг

   ```shell
   cp .env.example .env
   ```

### VI - Сборка

   ```shell
   docker-composer up -d --build
   ```

## Пути

1. Путь к Laravel проекту
```
./src
```

2. Путь к настройкам
```
.env
```

3. Путь к логам

```
./logs
```


4. Путь к контейнерам (laradock)

```
./dockers
```

5. Путь к настройкам контейнера

```
./configs
```

## Docker контейнеры

|Сервис|Имя контейнера|
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

## Настройки

Все настройки доступны в файле: `.env`

### Основные настройки:

|Ключ|Описание|
|:---|:---|
|APP_NAME|Имя проекта|
|PATH_DOCKER|Путь к файлам laradock|
|PATH_CONFIGS|Путь к настройкам контейнеров|
|PATH_LOGS|Путь к логам|
|DATA_PATH_HOST|Путь к хранилищу контейнеров|
|APP_CODE_PATH_HOST|Путь к приложению|
|APP_CODE_PATH_CONTAINER|Путь к приложению внутри контейнера|
|PHP_VERSION|Версия PHP|

### Настройки портов:

|Ключ|Описание|
|:---|:---|
|NGINX_HOST_HTTP_PORT|HTTP порт|
|NGINX_HOST_HTTPS_PORT|HTTPS порт|
|NGINX_PHP_UPSTREAM_PORT|Порт для проброса данных в Nginx|
|MYSQL_PORT|Порт Mysql|
|REDIS_PORT|Порт Redis|
|MEMCACHED_HOST_PORT|Порт Memcached|
|MONGODB_PORT|Порт MongoDB|
|LARAVEL_ECHO_SERVER_PORT|Порт Laravel Echo Server|
|SOKETI_PORT|Порт Soketi|
|SOKETI_METRICS_SERVER_PORT|Порт вебинтерфейса Soketi|
|MAILHOG_SMTP_PORT|Mailhog smtp port|
|MAILHOG_HTTP_PORT|Mailhog http port|
|SWAGGER_UI_PORT|Порт вебинтерфейса Swagger|
|SWAGGER_EDITOR_PORT|Порт редактора Swagger|
|REDIS_WEBUI_PORT|Порт вебинтерфейса Redis|
|REDIS_WEBUI_CONNECT_PORT|Порт подключения вебинтерфейса Redis|
|PHP_FPM_XDEBUG_PORT|Порт XDebug|

## Команды управления контейнером

1. Сборка контейнеров

   ```shell
   docker-compose up -d --build
   ```

2. Запуск контейнеров

   ```shell
   docker-compose start
   ```

3. Остановка контейнеров

   ```shell
   docker-compose stop
   ```

4. Список запущенных контейнеров

   ```shell
   docker ps
   ```

5. Список всех контейнеров

   ```shell
   docker ps -a
   ```
   
6. Подключение к контейнеру приложения

   ```shell
   docker exec -it laravel-workspace bash
   ```

7. Логи докера

   ```shell
   docker logs <container_name>
   ```

## Лицензия

DOCKER FOR LARAVEL набор настроек и конфигураций распространяемая по лицензии MIT. Для получения более подробной информации, пожалуйста, ознакомьтесь с [лицензионным файлом](https://github.com/cs-eliseev/docker-for-laravel/blob/master/LICENSE.md).

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)
