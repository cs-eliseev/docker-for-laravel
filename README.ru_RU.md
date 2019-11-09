[English](https://github.com/cs-eliseev/helpers-ip/blob/master/README.md) | Русский

DOCKER FOR LARAVEL
=======

[![Packagist](https://img.shields.io/packagist/l/cse/helpers-ip.svg?style=flat-square)](https://github.com/cs-eliseev/docker-for-laravel/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/docker-for-laravel.svg?style=flat-square)](https://github.com/cs-eliseev/docker-for-laravel/archive/master.zip)


## Описание

Создайте среду разработки Laravel, используя докер LEMP.
Использует постоянное хранилище базы данных и стек PHP, MySQL, Redis, Nginx (http, https).


## Информация

### Ссылки проета

* Laravel приложение HTTP: http://localhost:5101
* Laravel приложение HTTPS: http://localhost:5102
* MySQL: http://localhost:5103
* Redis: http://localhost:5104
* XDebug: http://localhost:5105

Установлено перенаправление с HTTP на HTTPS.

### Путь к приложению Laravel

```
src/
```

### Логи хранятся

```
src/logs
```

## Использование

### Установка

#### Git

Добавить этот репозиторий локально можно следующим образом:
```bash
git clone https://github.com/cs-eliseev/docker-for-laravel.git
```

#### Скачать

[Скачать последнюю версию проекта можно здесь](https://github.com/cs-eliseev/docker-for-laravel/archive/master.zip).

### Установка инструментов для разработки

* Установка [docker](https://docs.docker.com/engine/installation/)
* Установка [docker-compose](https://docs.docker.com/compose/install/)

### Создание проекта

1. Создание нового Laravel проекта в Docker

    ```shell
    composer create-project --prefer-dist laravel/laravel src
    ```

1. Добавление существующего Laravel проекта в Docker

    ```shell
    git clone <link> src
    ```

### Развертывание проекта

1. Перейти в папку с Laravel проектом

    ```shell
    cd src
    ```

1. Установить через Composer зависимости Laravel

    ```shell
    composer require predis/predis
    ```

1. Обновить Composer

    ```shell
    composer update
    ```

1. Установить через NPM зависимости Laravel

    ```shell
    npm i
    ```

1. Добавить права в Laravel проект

    ```shell
    sudo chmod 777 -R storage bootstrap/cache
    ```

1. Добавить группу в Laravel проект

    ```shell
    sudo chown -R 1000:1000 storage bootstrap/cache
    ```

1. Собрать Docker контейнеры

    ```shell
    docker-compose up --build
    ```

1. Сгенерировать ключ для Laravel приложения

    ```shell
    docker exec -it laravel-container php artisan key:generate
    ```

1. Использовать проект

    HTTP - http://localhost:5101

    HTTPS - https://localhost:5102

### Подключение MySQL

1. Получить настройки сети MySQL в Docker контейнере

    ```shell
    docker inspect datebase-container
    ```

1. Установить конфигурацию для MySQL в Laravel

   Отредактировать ```src/.env```

    ```text
    DB_CONNECTION=mysql
    DB_HOST=datebase-container
    DB_PORT=3306
    DB_DATABASE=laravel_project
    DB_USERNAME=root
    DB_PASSWORD=123456
    ```

1. Использование MySQL в Docker контейнере

    ```shell
    docker-compose exec database bash -c 'mysql -u root -p 123456 laravel_project'
    ```

1. Запуск миграций баз данных в Docker контейнере

    ```
    docker-compose exec laravel php artisan migrate
    ```

1. Очистка базыданных Docker контейнере

    ```
    docker-compose down --volumes --rmi all
    docker-compose up -d --build
    docker-compose exec laravel php artisan migrate
    ```

### Redis

1. Установить конфигурацию для Redis в Laravel

    Отредактировать ```src/.env```

    ```text
    REDIS_HOST=redis-container
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    ```

1. Проверка Redis

    ```shell
    docker-compose exec laravel php artisan tinker
    Illuminate\Support\Facades\Redis::set('name', 'hoge');
    Illuminate\Support\Facades\Redis::get('name');
    exit
    ```

1. Использование клиента Redis

    ```shell
    docker-compose exec redis redis-cli
    ```

### Тестирование

PHPUnit используется для модульного тестирования. Данные тесты гарантируют, что методы класса выполняют свою задачу.

Подробную документацию по PHPUnit можно найти по адресу: https://phpunit.de/documentation.html.

1. Добавьте тестовое приложение Laravel, подключение базы данных к контейнеру Docker

   Создайте новый класс для unit тестов ```DbConnectivityTest``` в папке ```src/tests/Feature```
    
    ```php
    <?php
    
    namespace Tests\Feature;
    
    use Illuminate\Database\Connection;
    use Tests\TestCase;
 
    class DbConnectivityTest extends TestCase
    {
        public function testDbConnectivity()
        {
            /** @var Connection $db */
            $db = $this->app->make("db");
            $row = $db->selectOne("SELECT 1 AS one");
            $this->assertEquals(1, $row->one);
        }
    }
    ```

1. Чтобы использовать настройки по умолчанию, достаточно выполнить в Docker контейнере

    ```shell
    docker-compose exec laravel ./vendor/bin/phpunit
    ```

### Создание SSL сертификатов

1. Выполните команду OpenSSL для создания ssl-сертификата

    ```shell
    sudo openssl req -x509 -nodes -days 999999 -newkey rsa:2048 -keyout docker/laravel/nginx/cert/nginx.key -out docker/laravel/nginx/cert/nginx.crt
    ```


## Управление проектом

### Git

Для получения информации о работе с Git, ознакомьтесь с [файлом](https://github.com/cs-eliseev/docker-for-laravel/blob/master/info/git.md).

### Docker

Для получения информации о работе с Docker, ознакомьтесь с [файлом](https://github.com/cs-eliseev/docker-for-laravel/blob/master/info/docker.md).


## Вклад в общее дело

Вы можите поддержать данный проект [здесь](https://www.paypal.me/cseliseev/10usd). 
Вы также можете помочь, внеся свой вклад в проект или сообщив об ошибках.
Даже высказывать свои предложения по функциям - это здорово. Все, что поможет, высоко ценится.


## Лицензия

DOCKER FOR LARAVEL набор настроек и конфигураций распространяемая по лицензии MIT. Для получения более подробной информации, пожалуйста, ознакомьтесь с [лицензионным файлом](https://github.com/cs-eliseev/docker-for-laravel/blob/master/LICENSE.md).

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)
