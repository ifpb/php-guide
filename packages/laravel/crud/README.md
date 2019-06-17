# CRUD

- [Route](#route)
- [Controller](#controller)
- [Model](#model)
- [Migration](#migration)
- [Seeder](#seeder)
- [View](#view)

## Route

---

**routes/web.php**

```php
{% include_relative project/routes/web.php %}
```

```
$ php artisan route:list
+--------+-----------+------------------------+-----------------+------------------------------------------------+--------------+
| Domain | Method    | URI                    | Name            | Action                                         | Middleware   |
+--------+-----------+------------------------+-----------------+------------------------------------------------+--------------+
|        | GET|HEAD  | /                      |                 | Closure                                        | web          |
|        | GET|HEAD  | alumnus                | alumnus.index   | App\Http\Controllers\AlumnusController@index   | web          |
|        | POST      | alumnus                | alumnus.store   | App\Http\Controllers\AlumnusController@store   | web          |
|        | GET|HEAD  | alumnus/create         | alumnus.create  | App\Http\Controllers\AlumnusController@create  | web          |
|        | GET|HEAD  | alumnus/{alumnus}      | alumnus.show    | App\Http\Controllers\AlumnusController@show    | web          |
|        | PUT|PATCH | alumnus/{alumnus}      | alumnus.update  | App\Http\Controllers\AlumnusController@update  | web          |
|        | DELETE    | alumnus/{alumnus}      | alumnus.destroy | App\Http\Controllers\AlumnusController@destroy | web          |
|        | GET|HEAD  | alumnus/{alumnus}/edit | alumnus.edit    | App\Http\Controllers\AlumnusController@edit    | web          |
|        | GET|HEAD  | api/user               |                 | Closure                                        | api,auth:api |
+--------+-----------+------------------------+-----------------+------------------------------------------------+--------------+
```

## Controller

---

```
$ php artisan make:controller AlumniController --resource --model=Alumnus
```

**app/Http/Controllers/AlumniController.php**

```php
{% include_relative project/app/Http/Controllers/AlumniController.php %}
```

## Model

---

**app/Alumnus.php**

```php
{% include_relative project/app/Alumnus.php %}
```

```
$ php artisan migrate
$ php artisan make:migration create_alumni_table
Created Migration: 2019_06_12_034853_create_alumni_table
```

## Migration

---

**database/migrations/2019_06_12_034853_create_alumni_table.php**

```php
{% include_relative project/database/migrations/2019_06_12_034853_create_alumni_table.php %}
```

## Seeder

---

```
$ php artisan make:seeder AlumniTableSeeder
```

**database/seeds/AlumniTableSeeder.php**

```php
{% include_relative project/database/seeds/AlumniTableSeeder.php %}
```

```
$ php artisan db:seed --class=AlumniTableSeeder
```

## View

---

[resources/views/layout.blade.php](https://github.com/ifpb/php-guide/tree/master/packages/laravel/crud/project/resources/views/layout.blade.php)

```php
{% include_relative project/resources/views/layout.blade.php %}
```

[resources/views/alumni/index.blade.php](https://github.com/ifpb/php-guide/tree/master/packages/laravel/crud/project/resources/views/alumni/index.blade.php)

```php
{% include_relative project/resources/views/alumni/index.blade.php %}
```

[resources/views/alumni/create.blade.php](https://github.com/ifpb/php-guide/tree/master/packages/laravel/crud/project/resources/views/alumni/create.blade.php)

```php
{% include_relative project/resources/views/alumni/create.blade.php %}
```

[resources/views/alumni/edit.blade.php](https://github.com/ifpb/php-guide/tree/master/packages/laravel/crud/project/resources/views/alumni/edit.blade.php)

```php
{% include_relative project/resources/views/alumni/edit.blade.php %}
```

## References

---

- [Laravel 5.8 CRUD Tutorial With Example For Beginners](https://appdividend.com/2019/03/08/laravel-5-8-crud-tutorial-with-example-for-beginners/)
- [Laravel 5.7 CRUD Example Tutorial For Beginners From Scratch](https://appdividend.com/2018/09/06/laravel-5-7-crud-example-tutorial/)
