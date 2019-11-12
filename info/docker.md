Docker
======

Docker provides a way to run applications securely isolated in a container, packaged with all its dependencies and libraries.

## Docker install

1. Uninstall Old Versions of Docker

    ```shell
    sudo apt-get remove docker docker-engine docker.io
    ```
1. Install Dependency packages
    ```shell
    sudo apt-get update
    sudo apt-get -y install apt-transport-https ca-certificates curl software-properties-common
    ```

1. Add Docker’s official GPG key
    ```shell
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
    ```

1. Add the Docker repository

    Ubuntu 18.04
    ```shell
    sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(. /etc/os-release; echo "$UBUNTU_CODENAME") stable"
    ```

    Mint 19.2
    ```shell
    sudo add-apt-repository "deb https://download.docker.com/linux/ubuntu bionic stable"
    ```

1. Update Repositories
    ```shell
    sudo apt-get update
    ```

1. Install Latest Version of Docker

    ```shell
    sudo apt-get install docker-ce
    ```

1. Install Docker Compose
    ```shell
    sudo apt-get -y  install docker-compose
    ```

1.  Add docker user

    ```shell
    sudo groupadd docker
    sudo usermod -aG docker $USER
    ```

1. Check systemctl
    ```shell
    sudo systemctl status docker
    ```

1. Test run docker container
    ```shell
    docker run --rm -it  --name test alpine:latest /bin/sh
    cat /etc/os-release 
    exit
    ```

1. Fix permission denied docker
    ```shell
    sudo chmod 666 /var/run/docker.sock
    ``` 

## Docker commands

1. Running background docker-compose project

    ```shell
    docker-compose up -d
    ```

1. Start all Docker containers

    ```shell
    docker-compose start
    ```

1. Stop all Docker containers

    ```shell
    docker-compose stop
    ```

1. Stop Docker container

    ```shell
    docker stop <container_name>
    ```

1. Running command docker-compose in a docker-compose service

    ```shell
    docker-compose exec <service_name> <command>
    ```

1. Running command in a Docker container

    ```shell
    docker-compose exec <container_name> <command>
    ```

1. Connect Docker container

    ```shell
    docker exec -it <container_name> bash
    docker-compose exec <service_name> /bin/bash
    ```

1. Copy files/folders to Docker container or filesystem

    ```shell
    docker cp <file_path> <container_name>:<copy_path>
    docker cp <container_name>:<file_path> <copy_path> 
    ```
    
1. View list running Docker container

    ```shell
    docker ps
    ```

1. View list all Docker container

    ```shell
    docker ps -a
    ```
    
1.  Fetch the logs in a docker-compose

    ```shell
    docker-compose logs -f
    ```

1. Get low-level information on Docker objects

    ```shell
    docker inspect -f <container_name>
    ```

1. Remove Docker containers

    ```shell
    docker rm <container_name>
    ```

1. View list Docker images

    ```shell
    docker images
    ```

1. Remove Docker images

    ```shell
    docker image prune
    ```

1. Remve Docker network
    ```shell
    docker network prune
    ```

1. Remove Docker images

    ```shell
    docker rmi <image_id>
    ```

1. Create Docker images
    ```shell
    docker build --no-cache=true -t <image_name> .
    ```

1. Create Docker container
    ```shell
    docker run --name <image_name> --rm -it <container_name> 
    ```


## Docker config

1. PHP 7.1 Docker config
    ```shell
    RUN yum install -y epel-release
    RUN rpm -Uvh https://mirror.webtatic.com/yum/el7/webtatic-release.rpm

    RUN yum install -y httpd
    RUN yum install -y mod_php71w php71w-common
    RUN yum install -y php71w-mcrypt php71w-opcache
    RUN yum install -y php71w-mysql php71w-pdo
    RUN yum install -y php71w-cli
    RUN yum install -y php71w-mbstring
    RUN yum install -y php71w-xsl
    RUN yum install -y php71w-xml
    RUN yum install -y bind-utils sendmail
    ```
