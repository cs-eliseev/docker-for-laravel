# Laravel To Docker

[![Packagist](https://img.shields.io/packagist/l/cse/helpers-ip.svg?style=flat-square)](https://github.com/cs-eliseev/docker-for-laravel/blob/master/LICENSE.md)
[![GitHub repo size](https://img.shields.io/github/repo-size/cs-eliseev/docker-for-laravel.svg?style=flat-square)](https://github.com/cs-eliseev/docker-for-laravel/archive/master.zip)

## Description

Build Laravel's development environment using docker LEMP. 
Uses a persistant database store PHP, MySQL, Nginx, Redis


## Info

### Project link

* Laravel application HTTP: http://localhost:5101
* Laravel application HTTPS: http://localhost:5102
* MySQL: http://localhost:5103
* Redis: http://localhost:5104
* XDebug: http://localhost:5105

Set redirect from HTTP to HTTPS.

### Laravel project path

```
src/
```

### Logs path

```
src/logs
```

## Usage

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

1. Go to the Laravel project

    ```shell
    cd src
    ```

1. Add composer Laravel dependency

    ```shell
    composer require predis/predis
    ```

1. Update Composer Laravel dependency

    ```shell
    composer update
    ```

1. Install NPM Larave dependency

    ```shell
    npm i
    ```

1. Add needs write permissions to Laravel project

    ```shell
    sudo chmod 777 -R storage bootstrap/cache
    ```

1. Add group to Laravel project

    ```shell
    sudo chown -R 1000:1000 storage bootstrap/cache
    ```

1. Build all Docker containers

    ```shell
    docker-compose up --build
    ```

1. Create Laravel application key

    ```shell
    docker exec -it laravel-container php artisan key:generate
    ```

1. Use project

    http://localhost:5101

### MySQL connection

1. Get mysql network info in a Docker container

    ```shell
    docker inspect datebase-container
    ```

1. Set .env info mysql network

   Edit ```src/.env``` file

    ```env
    DB_CONNECTION=mysql
    DB_HOST=datebase-container
    DB_PORT=3306
    DB_DATABASE=laravel_project
    DB_USERNAME=root
    DB_PASSWORD=123456
    ```

1. Use MySQL in a Docker container

    ```shell
    docker-compose exec database bash -c 'mysql -u root -p 123456 laravel_project'
    ```

1. Run Laravel Migration to Docker

    ```
    docker-compose exec laravel php artisan migrate
    ```

1. Clear database to Docker

    ```
    docker-compose down --volumes --rmi all
    docker-compose up -d --build
    docker-compose exec laravel php artisan migrate
    ```

### Redis

1. Set .env info mysql network

    ```.env
    REDIS_HOST=redis-container
    REDIS_PASSWORD=null
    REDIS_PORT=6379
    ```

1. Test Redis

    ```shell
    docker-compose exec laravel php artisan tinker
    Illuminate\Support\Facades\Redis::set('name', 'hoge');
    Illuminate\Support\Facades\Redis::get('name');
    exit
    ```

1. Use Redis cli

    ```shell
    docker-compose exec redis redis-cli
    ```

### Use UnitTest

1. Add unit test Laravel db connect to Docker

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

1. Run PHPUnit test to Docker

    ```shell
    docker-compose exec laravel ./vendor/bin/phpunit
    ```

### Create SSL cert

1. Running OpenSSL command create ssl certs

    ```shell
    sudo openssl req -x509 -nodes -days 999999 -newkey rsa:2048 -keyout docker/laravel/nginx/cert/nginx.key -out docker/laravel/nginx/cert/nginx.crt
    ```

## Donating

You can support this project [here](https://www.paypal.me/cseliseev/10usd). 
You can also help out by contributing to the project, or reporting bugs. 
Even voicing your suggestions for features is great. Anything to help is much appreciated.


## License

The IP CSE HELPERS is open-source PHP library licensed under the MIT license. Please see [License File](https://github.com/cs-eliseev/docker-for-laravel/blob/master/LICENSE.md) for more information.

***

> GitHub [@cs-eliseev](https://github.com/cs-eliseev)