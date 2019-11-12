Laravel
====

## Settings

1. Init Laravel IDE Helper

    ```shell
    composer require barryvdh/laravel-ide-helper
    composer update
    php artisan clear-compiled
    php artisan ide-helper:generate
    php artisan optimize
    ```

1. Init model Laravel IDE Helper

    ```shell
    php artisan ide-helper:models
    ```


## Laravel command

1. Create Laravel model

    ```shell
    php artisan make:model ModelName -mcr
    ```

    * **-m** - Create a new migration file for the model
    * **-c** - Create a new controller file for the model
    * **-r** - Create a new resource file for the model

1. Create Laravel controller

    ```shell
    php artisan make:controller ModelName -mr
    ```

    * **-m** - Create a new model file for the controller
    * **-r** - Create a new resource file for the controller

1. Create Laravel migration

    ```shell
    php artisan make:migration ModelName
    ```

1. Clear cache to Laravel

    ```shell
    php artisan route:clear
    php artisan config:clear
    php artisan cache:clear
    composer dump-autoload --optimize
    ```

1. Show Laravel application key

    ```shell
    php artisan key:generate --show
    ```

1. WebPack running

    ```shell
    npm run watch
    ```