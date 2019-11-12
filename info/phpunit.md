PHPUnit
====

PHPUnit is a programmer-oriented testing framework for PHP.
It is an instance of the xUnit architecture for unit testing frameworks.


## Usage

1. Instruction PHPUnit https://phpunit.readthedocs.io/en/latest/textui.html

1. Example PHPUnit xml
    ```xml phpunit.xml
    <testsuites>
        <testsuite name="Both">
          <testsuite name="Library">
            <directory>library</directory>
          </testsuite>
          <testsuite name="XXX_Form">
            <file>library/XXX/FormTest.php</file>
            <directory>library/XXX/Form</directory>
          </testsuite>
      </testsuite>
    </testsuites>
    ```

1. Run terminal PHPUnit test
    ```shell
    php vendor/bin/phpunit --configuration <file_name>.xml --testsuite <testsuite_name>
    ```

    Example:
    ```shell
    php phpunit --configuration config.xml --testsuite Both
    php phpunit --configuration config.xml --testsuite Library
    ```

1. Running all phpunit test
    ```shell
    php vendor/bin/phpunit <file_name>
    ```

1. PHPUnit params:
    * **.** - Printed when the test succeeds.
    * **F** - Printed when an assertion fails while running the test method.
    * **E** - Printed when an error occurs while running the test method.
    * **R** - Printed when the test has been marked as risky
    * **S** - Printed when the test has been skipped
    * **I** - Printed when the test is marked as being incomplete or not yet implemented
