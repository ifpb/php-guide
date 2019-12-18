# Authentication

## Quickstart

---

> Migration:

```
$ docker-compose exec php sh
# php artisan migrate
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (0.25 seconds)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (0.2 seconds)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (0.11 seconds)
```

> require laravel/ui:

```
# composer require laravel/ui --dev
Using version ^1.1 for laravel/ui
./composer.json has been updated
Loading composer repositories with package information
Updating dependencies (including require-dev)
Package operations: 1 install, 0 updates, 0 removals
  - Installing laravel/ui (v1.1.1): Downloading (100%)
Writing lock file
Generating optimized autoload files
> Illuminate\Foundation\ComposerScripts::postAutoloadDump
> @php artisan package:discover --ansi
Discovered Package: facade/ignition
Discovered Package: fideloper/proxy
Discovered Package: laravel/tinker
Discovered Package: laravel/ui
Discovered Package: nesbot/carbon
Discovered Package: nunomaduro/collision
Package manifest generated successfully.
```

> ui bootstrap:

```
# php artisan ui bootstrap
Bootstrap scaffolding installed successfully.
Please run "npm install && npm run dev" to compile your fresh scaffolding.
```

> npm install:

```
# npm install && npm run dev
npm notice created a lockfile as package-lock.json. You should commit this file.
npm WARN optional SKIPPING OPTIONAL DEPENDENCY: fsevents@1.2.11 (node_modules/fsevents):
npm WARN notsup SKIPPING OPTIONAL DEPENDENCY: Unsupported platform for fsevents@1.2.11: wanted {"os":"darwin","arch":"any"} (current: {"os":"linux","arch":"x64"})

added 1008 packages from 489 contributors and audited 17218 packages in 201.783s
found 0 vulnerabilities


> @ dev /var/www
> npm run development


> @ development /var/www
> cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js

        Additional dependencies must be installed. This will only take a moment.

        Running: npm install vue-template-compiler --save-dev --production=false

npm WARN optional SKIPPING OPTIONAL DEPENDENCY: fsevents@1.2.11 (node_modules/fsevents):
npm WARN notsup SKIPPING OPTIONAL DEPENDENCY: Unsupported platform for fsevents@1.2.11: wanted {"os":"darwin","arch":"any"} (current: {"os":"linux","arch":"x64"})

        Okay, done. The following packages have been installed and saved to your package.json dependencies list:

        - vue-template-compiler

98% after emitting SizeLimitsPlugin

 DONE  Compiled successfully in 33860ms                                                                                                         11:30:19 AM

       Asset      Size   Chunks             Chunk Names
/css/app.css   196 KiB  /js/app  [emitted]  /js/app
  /js/app.js  1.06 MiB  /js/app  [emitted]  /js/app
```

> scaffolding auth

```
# php artisan ui bootstrap --auth
Bootstrap scaffolding installed successfully.
Please run "npm install && npm run dev" to compile your fresh scaffolding.
Authentication scaffolding generated successfully.
```

> npm install

```
# npm install && npm run dev
npm WARN optional SKIPPING OPTIONAL DEPENDENCY: fsevents@1.2.11 (node_modules/fsevents):
npm WARN notsup SKIPPING OPTIONAL DEPENDENCY: Unsupported platform for fsevents@1.2.11: wanted {"os":"darwin","arch":"any"} (current: {"os":"linux","arch":
"x64"})

added 1010 packages from 489 contributors and audited 17221 packages in 117.039s
found 0 vulnerabilities


> @ dev /var/www
> npm run development


> @ development /var/www
> cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js

98% after emitting SizeLimitsPlugin

 DONE  Compiled successfully in 33657ms                                                                                                         11:37:32 AM

       Asset      Size   Chunks             Chunk Names
/css/app.css   196 KiB  /js/app  [emitted]  /js/app
  /js/app.js  1.06 MiB  /js/app  [emitted]  /js/app
```

## Routes

---

```
# php artisan route:list
+--------+----------+------------------------+------------------+------------------------------------------------------------------------+--------------+
| Domain | Method   | URI                    | Name             | Action                                                                 | Middleware   |
+--------+----------+------------------------+------------------+------------------------------------------------------------------------+--------------+
|        | GET|HEAD | /                      |                  | Closure                                                                | web          |
|        | GET|HEAD | api/user               |                  | Closure                                                                | api,auth:api |
|        | GET|HEAD | home                   | home             | App\Http\Controllers\HomeController@index                              | web,auth     |
|        | GET|HEAD | login                  | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest    |
|        | POST     | login                  |                  | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
|        | POST     | logout                 | logout           | App\Http\Controllers\Auth\LoginController@logout                       | web          |
|        | GET|HEAD | password/confirm       | password.confirm | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm    | web,auth     |
|        | POST     | password/confirm       |                  | App\Http\Controllers\Auth\ConfirmPasswordController@confirm            | web,auth     |
|        | POST     | password/email         | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web          |
|        | GET|HEAD | password/reset         | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web          |
|        | POST     | password/reset         | password.update  | App\Http\Controllers\Auth\ResetPasswordController@reset                | web          |
|        | GET|HEAD | password/reset/{token} | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web          |
|        | GET|HEAD | register               | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest    |
|        | POST     | register               |                  | App\Http\Controllers\Auth\RegisterController@register                  | web,guest    |
+--------+----------+------------------------+------------------+------------------------------------------------------------------------+--------------+
```

## Controllers

---

> `app/Http/Controllers/`:

```
.
├── Auth
│   ├── ConfirmPasswordController.php
│   ├── ForgotPasswordController.php
│   ├── LoginController.php
│   ├── RegisterController.php
│   ├── ResetPasswordController.php
│   └── VerificationController.php
├── Controller.php
└── HomeController.php
```

## Views

---

> `resources/views/`:

```
├── auth
│   ├── login.blade.php
│   ├── passwords
│   │   ├── confirm.blade.php
│   │   ├── email.blade.php
│   │   └── reset.blade.php
│   ├── register.blade.php
│   └── verify.blade.php
├── home.blade.php
├── layouts
│   └── app.blade.php
└── welcome.blade.php
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

> `resources/views/layouts/app.blade.php`:

```php
{% include_relative src/resources/views/layouts/app.blade.php %}
```

> `resources/views/home.blade.php`:

![](assets/home.png)

```php
{% include_relative src/resources/views/home.blade.php %}
```

> `resources/views/auth/login.blade.php`:

![](assets/login.png)

```php
{% include_relative src/resources/views/auth/login.blade.php %}
```

> `resources/views/auth/register.blade.php`:

![](assets/register.png)

> `resources/views/auth/reset.blade.php`:

![](assets/reset.png)

## References

- [Laravel Doc](https://laravel.com/docs/6.x)
  - [JavaScript & CSS Scaffolding](https://laravel.com/docs/6.x/frontend)
  - [Authentication](https://laravel.com/docs/6.x/authentication)
  - [Localization](https://laravel.com/docs/6.x/localization)
- [Laravel 6 Auth Tutorial: Login/Register/Password Reset UI](https://www.techiediaries.com/laravel-authentication-tutorial/)
- [Laravel 6 Multi Auth (Authentication) Tutorial](https://www.itsolutionstuff.com/post/laravel-6-multi-auth-authentication-tutorialexample.html)
- [php artisan make:auth in laravel 6.0](https://dev.to/msamgan/php-artisan-make-auth-in-laravel-6-0-hc)
- [Running make:auth in Laravel 6](https://laravel-news.com/running-make-auth-in-laravel-6)
- [LARAVEL 6.0 intro to new Laravel Authentication](https://www.youtube.com/watch?v=zEPYSNO7o3Q)
- [Default Login/Register/Auth process in Laravel 6 \| Install laravel/ui package \| Update UI Design](https://www.youtube.com/watch?v=GWl5-VLCiJA)
