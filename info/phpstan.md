PHPStan
===

PHP static analysis code

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