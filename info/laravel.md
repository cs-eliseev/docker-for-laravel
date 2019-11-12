Laravel
====

## PHPStorm plugin Laravel

1. Install plugin Laravel
    **File — Settings — Plugins**

    Search *Laravel* and install *Laravel Plugin*

1. Enabled plugin Laravel
    **File — Settings — «Languages & Frameworks» — PHP  — Laravel**

    Set *"Enable plugin for this project"* 

## PHPStorm plugin VueJs

1. Settings VueJs
    **File — Settings — Plugins**
    
    Search *Vue* and install *VueJs*
    
## Laravel IDE Helper

1. Install Laravel IDE Helper

    ```shell
    composer require-dev arryvdh/laravel-ide-helper
    composer update
    ```

    Set provider in a ```config/app.php``` file.

    ```php
    'providers' => [
        ...,
        Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
    ],
    ```

1. Init Laravel IDE Helper

    ```shell
    php artisan ide-helper:generate
    ```
    
1. Init new model

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