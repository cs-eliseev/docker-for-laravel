PHPStan
===


PHP static analysis code. 
PHPStan focuses on finding errors in your code without actually running it. 
It catches whole classes of bugs even before you write tests for the code. 
It moves PHP closer to compiled languages in the sense that the correctness of each line of the code can be checked 
before you run the actual line.


## Install

1. Install PHPStan

    ```shell
    composer require --dev phpstan/phpstan
    ```

1. First run

    ```shell
    vendor/bin/phpstan analyse src
    ```


## Command

1. Set multi dir analysis
    ```shell
    vendor/bin/phpstan analyse test app
    ```
    

## Plagein Larastan

Is a phpstan/phpstan wrapper for Laravel. Larastan focuses on finding errors in your code without actually running it. It catches whole classes of bugs even before you write tests for the code.

### Installation

```shell
composer require --dev nunomaduro/larastan
```

### Usage in Laravel Applications

```shell
php artisan code:analyse
```

### Custom configuration

```yml
includes:
    - ./vendor/nunomaduro/larastan/extension.neon
parameters:
    level: 5
    ignoreErrors:
        - '#Access to an undefined property App\\Demo\\[a-zA-Z0-9\\_]+::\$[a-zA-Z0-9\\_]+\.#'
        - '#Call to an undefined method App\\Http\\Resources\\DemoResource::DemoMethod\(\)\.#'
    excludes_analyse:
        - /*/*/FileToBeExcluded.php
```

### Rule levels
```shell
php artisan code:analyse --level=max
```

### Paths
```shell
php artisan code:analyse --paths="modules,app,domain"
```

### Error formats
```shell
php artisan code:analyse --error-format table
```

Format:
* checkstyle
* raw
* table
* json
* prettyJson
