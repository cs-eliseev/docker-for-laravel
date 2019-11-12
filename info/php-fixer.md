PHP CS Fixer
===

The PHP Coding Standards Fixer (PHP CS Fixer) tool fixes your code to follow standards; whether you want to follow PHP coding standards as defined in the PSR-1, PSR-2, etc., or other community driven ones like the Symfony one

## Install

1. Install PHP CS Fixer

    ```shell
    composer global require friendsofphp/php-cs-fixer
    ```

1. Create settings

    Create file ```src/.php_cs.dist```

    ```php
    <?php
    
    $finder = PhpCsFixer\Finder::create()
        ->exclude(['bootstrap', 'database', 'node_modules', 'public', 'storage', 'tests', 'vendor'])
        ->notPath('*')
        ->in(__DIR__);
    
    return PhpCsFixer\Config::create()
        ->setRules([
            '@PSR2' => true,
            'array_syntax' => ['syntax' => 'short'],
            'blank_line_after_namespace' => true,
            'blank_line_before_return' => true,
            'linebreak_after_opening_tag' => true,
            'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
            'no_extra_blank_lines' => true,
            'no_trailing_whitespace' => true,
            'no_unused_imports' => true,
            'no_useless_else' => true,
            'no_useless_return' => true,
            'phpdoc_order' => true,
            'phpdoc_separation' => true,
            'phpdoc_single_line_var_spacing' => true,
            'phpdoc_trim' => true,
            'single_blank_line_at_eof' => true,
            'single_blank_line_before_namespace' => true,
        ])
        ->setFinder($finder);
    ```

## Command

1. Autoformat
    ```shell
    php-cs-fixer fix
    ```

1. Fix file
    ```shell
    php-cs-fixer fix --rules=@Symfony /path/to/file.php
    ```

1. Command

    ```shell
    php-cs-fixer list
    ```

