# Docker Laravel

## Building the Containers

---

```
$ mkdir app
$ cd app
$ git clone https://github.com/laravel/laravel.git src
$ docker-compose up -d
$ docker-compose exec php sh
# php artisan migrate:install
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
$ docker-compose exec --user root php chmod -R 777 storage/
$ docker-compose up -d
$ docker-compose ps
```

## Migrating Data

---

```
$ docker-compose exec php php artisan list
$ docker-compose exec php php artisan migrate
```
