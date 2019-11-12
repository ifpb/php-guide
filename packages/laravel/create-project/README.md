# Create Project

## Installing Laravel

---

**Via Laravel Installer**

```
$ composer global require laravel/installer
```

```
$HOME/.config/composer/vendor/bin
```

```
$ laravel new app
```

**Via Composer Create-Project**

```
$ composer create-project --prefer-dist laravel/laravel app
```

**Via Github**

```
$ git clone https://github.com/laravel/laravel.git app
$ cd app
$ composer install
$ php artisan key:generate --ansi
```

**Docker Example**

[https://github.com/ifpb/php-guide/tree/master/packages/laravel/create-project/docker-composer-laravel.zip?raw=true](docker-composer-laravel.zip)

```
$ wget https://github.com/ifpb/php-guide/tree/master/packages/laravel/create-project/docker-composer-laravel.zip?raw=true
$ unzip docker-composer-laravel.zip
$ cd docker-composer-laravel
$ docker-compose up -d
$ docker-compose ps
$ docker-compose exec php php artisan list
$ docker-compose exec php php artisan migrate
```

## References

---

- [Laravel Doc - Installation](https://laravel.com/docs/6.x/installation)
- [The beauty of Docker for local Laravel development](https://dev.to/aschmelyun/the-beauty-of-docker-for-local-laravel-development-13c0)
- [How To Set Up Laravel, Nginx, and MySQL with Docker Compose](https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose)
- [Laradock](https://laradock.io)
- [Using Laravel 6 with Docker and Docker-Compose](https://www.techiediaries.com/docker-compose-laravel/)
