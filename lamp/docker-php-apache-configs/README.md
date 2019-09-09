# LAMP Server (Docker)

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

## References

---

- [Docker](https://www.docker.com/)
- [Docker Hub](https://hub.docker.com/)

## Files

---

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

## docker-compose.yml

---

**docker-compose.yml:**

```yaml
{% include_relative docker-compose.yml %}
```

## Dockerfile

---

**docker/php/Dockerfile:**

```yaml
{% include_relative docker/php/Dockerfile %}
```

## Creating LAMP

---

```bash
$ cd docker-php-apache

$ docker-compose up -d

$ docker-compose ps

$ curl -i http://localhost:8080/

$ docker-compose down
```

## Checking PHP

---

```sh
$ docker exec -it web bash

$ php -i

$ php -m
```

## Running PHP code (Interactive shell)

---

```
$ docker run -it --rm --name php -v "$PWD":/usr/src/app -w /usr/src/app php:alpine php
$ php -a
Interactive shell

php > $x = 10;
php > echo $x;
10
php > exit
```

## Running PHP code (File)

---

```
$ echo '<?php echo 'Hello world!'; ?>' > hello.php
$ docker run -it --rm --name php -v "$PWD":/usr/src/app -w /usr/src/app php:alpine php -f hello.php
Hello world!
```

## Connecting to Mysql

---

```
$ docker exec -it mysql bash
# mysql -u root -p
mysql> SHOW DATABASES;
```

## Docker commands

---

- `docker exec -it <name> bash`
- `docker exec -it <name> bash`
- `docker ps`
- `docker-compose down`
- `docker-compose up -d`
- `docker-comppose ps`
