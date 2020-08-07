English | [Русский](https://github.com/cs-eliseev/docker-for-laravel/blob/master/README.ru_RU.md)

DOCKER FOR LARAVEL
=======

[![Packagist](https://img.shields.io/packagist/l/cse/helpers-ip.svg?style=flat-square)](https://github.com/cs-eliseev/docker-for-laravel/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/docker-for-laravel.svg?style=flat-square)](https://github.com/cs-eliseev/docker-for-laravel/archive/master.zip)


## Description

Build Laravel's development environment using docker LEMP. 
Uses a stack PHP, MySQL, Redis, Nginx.


## Info

### Project link

* Laravel application: http://localhost:6001
* Mailhog: http://localhost:6006

|Service|Port|
|:---|:---:|
|EchoServer|6001|
|HTTP|6002|
|MySQL|6004|
|SMPT|6005|
|MAILHOG|6006|
|Redis|6007|
|XDebug|9000|

### Docker containers

|Service|Container name|
|:---|:---:|
|Aplication|laravel-workspace|
|Nginx|laravel-nginx|
|PHP-FPM|laravel-php-fpm|
|MySQL|laravel-mysql|
|Redis|laravel-redis|
|LaravelHorizon|laravel-horizon|
|EchoServer|laravel-echo-server|
|MAILHOG|laravel-mailhog|

### Laravel project path

```
./src
```

### Logs path

```
./logs
```


## Usage

### Install

#### Git

Clone this repository locally:
```bash
git clone https://github.com/cs-eliseev/docker-for-laravel.git
```

#### Download

[Download the latest release here](https://github.com/cs-eliseev/docker-for-laravel/archive/master.zip).

### Install developments tools

* Install [docker](https://docs.docker.com/engine/installation/)
* Install [docker-compose](https://docs.docker.com/compose/install/)

### Create laravel project

1. Create a new Laravel project to Docker

    ```shell
    composer create-project --prefer-dist laravel/laravel src
    ```

1. Git clone project to Docker

    ```shell
    git clone <link> src
    ```

### Build application

1. Import dependency

    ```shell
    git clone https://github.com/laradock/laradock.git docker
    ```

1. Build all Docker containers

    ```shell
    docker-compose up --build
    ```

1. Build dependency

    ```shell
    docker exec laravel-workspace bash -c 'npm i --no-bin-links && composer require laravel/horizon && composer require predis/predis && composer update && php artisan key:generate && php artisan horizon:install && php artisan vendor:publish --provider="Laravel\Horizon\HorizonServiceProvider"'
    ```

### Laravel

1. Example laravel config

    ```shell script
    cat .env.laravel_example
    ```

### MySQL connection

1. Get MySQL network info in a Docker container

    ```shell
    docker inspect datebase-container
    ```

1. Settings MySQL to Laravel

   Edit ```src/.env``` file

    ```text
    DB_CONNECTION=mysql
    DB_HOST=database-container
    DB_PORT=3306
    DB_DATABASE=laravel_project
    DB_USERNAME=root
    DB_PASSWORD=123456
    ```

### Redis

1. Settings Redis to Laravel

    Edit ```src/.env``` file

    ```text
    REDIS_CLIENT=predis
    REDIS_HOST=redis-container
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    ```
    
### Use UnitTest

PHPUnit is used for unit testing. Unit tests ensure that class and methods does exactly what it is meant to do.

General PHPUnit documentation can be found at https://phpunit.de/documentation.html.

1. Add unit test Laravel application, db connection to Docker container

   Create a new PHPUnit Test class ```DbConnectivityTest``` in folder ```src/tests/Feature```
    
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

1. To run the PHPUnit unit tests, execute in a Docker container:

    ```shell
    docker-compose exec laravel ./vendor/bin/phpunit
    ```

### Create SSL cert

1. Running OpenSSL command create ssl certs

    ```shell
    sudo openssl req -x509 -nodes -days 999999 -newkey rsa:2048 -keyout docker/laravel/nginx/cert/nginx.key -out docker/laravel/nginx/cert/nginx.crt
    ```


## Project managment

### Git

Please see [Git File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/info/git.md) for information.

### Composer

Please see [Composer File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/info/composer.md) for information.

### NPM

Please see [NPM File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/info/npm.md) for information.

### PHPStan

Please see [PHPStan File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/info/phpstan.md) for information.

### PHPCPD

Please see [PHPCPD File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/info/phpcpd.md) for information.

### PHP CS Fixer

Please see [PHP CS Fixer File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/info/php-fixer.md) for information.

### PHPUnit

Please see [PHPUnit File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/info/phpunit.md) for information.

### XDebug

Please see [Xdebug File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/info/xdebug.md) for information.

### Docker

Please see [Docker File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/info/docker.md) for information.

### Laravel

Please see [Laravel File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/info/laravel.md) for information.

Use command to Docker container: ```docker exec -it laravel-container <command>```


## Donating

You can support this project [here](https://www.paypal.me/cseliseev/10usd). 
You can also help out by contributing to the project, or reporting bugs. 
Even voicing your suggestions for features is great. Anything to help is much appreciated.


## License

The DOCKER FOR LARAVEL set of settings and configurations licensed under the MIT license. Please see [License File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/LICENSE.md) for more information.

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)