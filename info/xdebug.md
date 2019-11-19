XDebug
====

Xdebug is an extension for PHP to assist with debugging and development. It 


## Install

1. Install local
	```shell
	sudo apt-get -y install php7.3-xdebug
	```

## XDebug use in a PHPStorm

1. PHPStorm settings add Build

    ```Open PHPStorm->File->Settings->Build, Execution, Deployment->Docker->+```
        
    Create new Build

    ```text
    name -> Docker
    Unix socket -> enable
    Connect successful -> check
    ```

1. PHP storm settings PHP CLI Interpreter

    ```Open PHPStorm->File->Settings->Languages & Frameworks->PHP```

    Click CLI Interpreter [...]

    Click ```+->From Docker, Vagrant, VM, Remote ...```

    Open windows "Configure Remote PHP Interpreter", settings:

    ```text
    Docker Compose -> enable
    Configuration file(s) -> ./docker-compose.yml
    Service -> laravel
    ```

    Settings Configure Remote PHP Interpreter
    
    ```text
    Name => laravel
    Visible only fpr this project => enable
    Server => Docker
    Connect to existing container => enable
    php executable => php
    ```

    Back settings

    ```text
    CLI Interpreter => laravel
    Path mappings => src/->/var/www/project
    ```

1. Add debug settings

    ```Open PHPStorm->File->Settings->Languages & Frameworks->PHP->Debug```

    Set XDebug
    ```text
    Debug port: 5401
    ```

    Click Validate

    New window setting

    ```text
    Local web server or Shared Folder => enabled
    Path to create validation script => <project_path>/docker-project/src/public
    Url to validation script: http://127.0.0.1:5101
    ```

1. Set server settings

    ```Open PHPStorm->File->Settings->Languages & Frameworks->PHP->Servers->+```

    ```text
    Name => Docker
    Host => 127.0.0.1
    Port => 5101
    Debugger => Xdebug
    Use path mapping => enabled
    File/Directory->Project files-><project_path>/docker-project->src => /var/www/project
    ```

1. Run configuration setting

    ```Open PHPStorm->Run->Edit configurations…->+->PHP Web Page```

    ```text
    Name => laravel
    Server => Docker
    Start URL => /
    ```