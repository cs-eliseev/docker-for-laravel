Composer
====

Composer is a tool for dependency management in PHP.

## Composer install

1. Install PHP CLI

    ```shell
    sudo apt install php-cli
    ```

1. Download composer
    ```shell
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    ```

1. Install Composer

    ```shell
    sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
    ```


## Composer command

1. Add token
    ```shell
    composer config -g <+> <token>
    ```

1. Init composer project
    ```shell
    composer init
    ```

1. Add composer require
    ```shell
    composer global require "<plagin>"
    ```

1. Install composer require
    ```shell
    composer install
    ```

1. Update composer require
     ```shell
    composer update
    ```

1. Update file autoload
    ```shell
    composer dump-autoload --optimize
    ```


## Add GitHub token

1. Registration github
    ```https://github.com/join```

1. Generate new tocken
    ```https://github.com/settings/tokens```

1. Add github token to composer
    ```shell
    composer config -g github-oauth.github.com ‹oauthtoken›
    ```
