# LAMP Server

- [Stack](#stack)
- [Docker](#docker)
  - [References](#references)
  - [Files](#files)
  - [docker-compose.yml](#docker-compose.yml)
  - [Dockerfile](#dockerfile)
  - [Creating LAMP](#creating-lamp)
  - [Checking PHP](#checking-php)
  - [Running PHP code (Interactive shell)](#running-php-code-interactive-shell)
  - [Running PHP code (File)](#running-php-code-file)
  - [Connecting to Mysql](#connecting-to-mysql)
  - [Docker commands](#docker-commands)
- [Vagrant](#vagrant)
  - [References](#references)
  - [Files](#files)
  - [Vagrantfile](#vagrantfile)
  - [Provision](#provision)
  - [Creating LAMP](#creating-lamp)
  - [Checking PHP](#checking-php)
  - [Connecting to VM via SSH and running PHP code (Interactive shell)](#connecting-to-vm-via-ssh-and-running-php-code-interactive-shell)
  - [Connecting to VM via SSH and running PHP code (File)](#connecting-to-vm-via-ssh-and-running-php-code-file)
  - [Vagrant commands](#vagrant-commands)

## Stack

---

- Linux
- Apache
- MySQL
- PHP

## Docker

---

### References

- [Docker](https://www.docker.com/)
- [Docker Hub](https://hub.docker.com/)

### Files

```sh
$ tree docker-php-apache/
docker-php-apache/
├── configs
│   └── mysql
├── data
│   └── mysql
├── docker
│   └── php
│       └── Dockerfile
├── docker-compose.yml
├── logs
│   └── mysql
└── src
    └── index.php

9 directories, 3 files
```

### docker-compose.yml

**docker-php-apache/docker-compose.yml:**

```yaml
{% include_relative docker-php-apache/docker-compose.yml %}
```

### Dockerfile

**docker-php-apache/docker/php/Dockerfile:**

```yaml
{% include_relative docker-php-apache/docker/php/Dockerfile %}
```

### Creating LAMP

```bash
$ cd docker-php-apache

$ docker-compose up -d

$ docker-compose ps

$ curl -i http://localhost:8080/

$ docker-compose down
```

### Checking PHP

```sh
$ docker exec -it web bash

$ php -i

$ php -m
```

### Running PHP code (Interactive shell)

```
$ docker run -it --rm --name php -v "$PWD":/usr/src/app -w /usr/src/app php:alpine php
$ php -a
Interactive shell

php > $x = 10;
php > echo $x;
10
php > exit
```

### Running PHP code (File)

```
$ echo '<?php echo 'Hello world!'; ?>' > hello.php
$ docker run -it --rm --name php -v "$PWD":/usr/src/app -w /usr/src/app php:alpine php -f hello.php
Hello world!
```

### Connecting to Mysql

```
$ docker exec -it mysql bash
# mysql -u root -p
mysql> SHOW DATABASES;
```

### Docker commands

- `docker exec -it <name> bash`
- `docker exec -it <name> bash`
- `docker ps`
- `docker-compose down`
- `docker-compose up -d`
- `docker-comppose ps`

## Vagrant

---

### References

- [Vagrant](https://www.vagrantup.com)
- [Vagrant Cloud](https://app.vagrantup.com/boxes/search))
- Provider: [Virtual Box](https://www.virtualbox.org)

### Files

```bash
$ tree vagrant/
vagrant/
├── Vagrantfile
├── install
│   └── lamp.sh
└── src
    └── index.php

2 directories, 3 files
```

### Vagrantfile

**vagrant/Vagrantfile:**

```rb
{% include_relative vagrant/Vagrantfile %}
```

### Provision

**vagrant/install/lamp.sh:**

```rb
{% include_relative vagrant/install/lamp.sh %}
```

### Creating LAMP

```bash
$ cd vagrant

$ vagrant up

$ vagrant status

$ curl -i http://localhost:8080/

$ vagrant suspend
```

### Checking PHP

```sh
$ vagrant ssh

$ php -i

$ php -m
```

### Connecting to VM via SSH and running PHP code (Interactive shell)

```
$ vagrant ssh
$ php -a
Interactive shell

php > $x = 10;
php > echo $x;
10
php > exit
```

### Connecting to VM via SSH and running PHP code (File)

```
$ vagrant ssh
$ echo '<?php echo 'Hello world!'; ?>' > hello.php
$ php -f hello.php
Hello world!
```

### Vagrant commands

- `vagrant box add <image>`
- `vagrant box list`
- `vagrant destroy`
- `vagrant ssh`
- `vagrant status`
- `vagrant suspend`
- `vagrant up`

<!--
sed -i -r -e 's/error_reporting = E_ALL & ~E_DEPRECATED/error_reporting = E_ALL | E_STRICT/g' /etc/php5/fpm/php.ini
-->