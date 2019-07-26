# CRUD Plus

## Authentication

---

### Quickstart

```
$ php artisan make:auth
```

### Routes

```
$ php artisan route:list
+--------+----------+------------------------+------------------+------------------------------------------------------------------------+--------------+
| Domain | Method   | URI                    | Name             | Action                                                                 | Middleware   |
+--------+----------+------------------------+------------------+------------------------------------------------------------------------+--------------+
|        | GET|HEAD | /                      |                  | Closure                                                                | web          |
|        | GET|HEAD | api/user               |                  | Closure                                                                | api,auth:api |
|        | GET|HEAD | home                   | home             | App\Http\Controllers\HomeController@index                              | web,auth     |
|        | GET|HEAD | login                  | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest    |
|        | POST     | login                  |                  | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
|        | POST     | logout                 | logout           | App\Http\Controllers\Auth\LoginController@logout                       | web          |
|        | POST     | password/email         | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest    |
|        | GET|HEAD | password/reset         | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest    |
|        | POST     | password/reset         | password.update  | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest    |
|        | GET|HEAD | password/reset/{token} | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest    |
|        | GET|HEAD | register               | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest    |
|        | POST     | register               |                  | App\Http\Controllers\Auth\RegisterController@register                  | web,guest    |
+--------+----------+------------------------+------------------+------------------------------------------------------------------------+--------------+
```

### Controllers

- `app/Http/Controllers/Auth`:
  - `LoginController`
  - `ForgotPasswordController`
  - `ResetPasswordController`
  - `RegisterController`
  - `RegisterController`
  - `VerificationController`

### Views

`resources/views`:

```
├── auth
│   ├── login.blade.php
│   ├── passwords
│   │   ├── email.blade.php
│   │   └── reset.blade.php
│   ├── register.blade.php
│   └── verify.blade.php
└── layouts
    └── app.blade.php
```

`Directives`:

- `@auth`
- `@guest`

`Illuminate\Support\Facades\Auth`:

- `Auth::user()`
- `Auth::id()`
- `Auth::check()`
- `Auth::login()`
- `Auth::logout()`

## Pagination

---

```php
Alumnus::paginate($per_page)
```

## Search

---

```php
Alumnus::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->paginate($per_page);
```

## Sort

---

```
$ composer require kyslik/column-sortable
$ php artisan vendor:publish --provider="Kyslik\ColumnSortable\ColumnSortableServiceProvider" --tag="config"
$ npm install font-awesome -D
$ @import "~font-awesome/scss/font-awesome";
$ npm run dev
```

```php
Alumnus::sortable()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->paginate($per_page);
```
