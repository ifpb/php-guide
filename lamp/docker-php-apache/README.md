# LAMP Server (Docker)

- [References](#references)
- [Files](#files)
- [Creating LAMP](#creating-lamp)
- [Checking PHP](#checking-php)
- [Running PHP code (Interactive shell)](#running-php-code-interactive-shell)
- [Connecting to Mysql](#connecting-to-mysql)
- [Docker commands](#docker-commands)

## References

---

- [Docker](https://www.docker.com/)
- [Docker Hub](https://hub.docker.com/)

## Files

---

[https://ifpb.github.io/php-guide/lamp/docker-php-apache.zip](../docker-php-apache.zip)

```sh
$ tree . -a
.
├── .env
├── Dockerfile
├── README.md
├── docker-compose.yml
└── src
    └── index.php

1 directory, 5 file
```

**.env:**

```yaml
{% include_relative .env %}
```

**docker-compose.yml:**

```yaml
{% include_relative docker-compose.yml %}
```

**Dockerfile:**

```yaml
{% include_relative Dockerfile %}
```

## Creating LAMP

---

```bash
$ docker-compose up -d
$ docker-compose ps
$ curl -i http://localhost:8080/
$ docker-compose down
```

## Checking PHP

---

```sh
$ docker-compose exec web bash
$ php -i
$ php -m
```

## Running PHP code (Interactive shell)

---

```
$ docker run -it --rm --name php -v "$PWD":/usr/src/app -w /usr/src/app php:alpine php
# php --version
```

```
$ alias php= 'docker run -it --rm --name php -v "$PWD":/usr/src/app -w /usr/src/app php:alpine php'
$ php --version
```

```
$ php -a
Interactive shell

php > $x = 10;
php > echo $x;
10
php > exit
```

## Connecting to Mysql

---

```
$ docker-compose exec mysql bash
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
- `docker-comppse ps`
- `docker-comppse exec <service> <command>`
