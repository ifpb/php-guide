# [How To Set Up Laravel, Nginx, and MySQL with Docker Compose](https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose)

- [Downloading Laravel and Installing Dependencies](#downloading-laravel-and-installing-dependencies)
- [Creating the Dockerfile and Docker Compose File](#creating-the-dockerfile-and-docker-compose-file)
- [Modifying Environment Settings](#modifying-environment-settings)
- [Running the Containers](#running-the-containers)
- [Migrating Data](#migrating-data)

## Downloading Laravel and Installing Dependencies

---

```sh
$ docker run --rm -v $(pwd):/app composer:latest composer create-project --prefer-dist laravel/laravel project
```

## Creating the Dockerfile and Docker Compose File

---

```sh
$ wget -O docker-config.zip https://github.com/ifpb/php-guide/blob/master/packages/laravel/laravel-docker/docker-config.zip?raw=true
$ docker run --rm -v $(pwd):/app composer:latest unzip docker-config.zip -d project/
$ cd project
$ tree .docker/
.docker/
├── mysql
│   └── my.cnf
├── nginx
│   └── conf.d
│       └── app.conf
└── php
    └── local.ini
```

**.docker/mysql/my.cnf**

```
{% include_relative docker-config/docker/mysql/my.cnf %}
```

**.docker/nginx/conf.d/app.conf**

```
{% include_relative docker-config/docker/nginx/conf.d/app.conf %}
```

**.docker/php/local.ini**

```
{% include_relative docker-config/docker/php/local.ini %}
```

**docker-compose.yml**

```yaml
{% include_relative docker-config/docker-compose.yml %}
```

**Dockerfile**

```yaml
{% include_relative docker-config/Dockerfile %}
```

## Modifying Environment Settings

---

**.env**

```
...

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret

...
```

## Running the Containers

---

```
$ docker-compose exec --user root app chmod -R 777 storage/
$ docker-compose up -d
$ docker-compose ps
```

## Migrating Data

---

```
$ docker-compose exec app php artisan list
$ docker-compose exec app php artisan migrate
```
