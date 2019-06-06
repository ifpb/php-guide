# MVC

- [Router](#router)
- [Controller](#controller)
- [View](#view)
- [Model](#model)

## Router

**routes/web.php**

```phpa
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello';
});

Route::get('/alumni', 'AlumniController@index');
```

```
$ docker-compose exec app php artisan route:list
```

## Controller

```
$ docker-compose exec app php artisan make:controller AlumniController
```

**app/Http/Controllers/AlumniController.php**

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index() {
        $alumni = [
            'Alana Morais',
            'Alex Martins',
            'Alexandre Dias'
        ];

        return view('alumni.index', [
            'alumni' =>  $alumni
        ]);
    }
}
```

## View

**resources/views/alumni/index.blade.php**

```php
@extends('layout')

@section('title', 'Alumni')

@section('content')
    <h1>Alumni</h1>
    <ul>
    @foreach ($alumni as $a)
        <li>{{ $a }}</li>
    @endforeach
    </ul>
@endsection
```

**resources/views/layout.blade.php**

```php
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>@yield('title')</title>
  </head>
  <body>
    <div class="container">
      <div>
        @yield('content')
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
```

## Model

```
$ php artisan make:migration create_users_table --create=alumni
```

**database/migrations/2019_06_05_185508_create_users_table.php**

```php
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('linkedin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumni');
    }
}
```

```
$ docker-compose exec app php artisan migrate
Migrating: 2019_06_05_185508_create_users_table
Migrated:  2019_06_05_185508_create_users_table
```

```
$ php artisan tinker
Psy Shell v0.9.9 (PHP 7.3.6 — cli) by Justin Hileman
>>> DB::select('show databases');
=> [
     {#3181
       +"Database": "information_schema",
     },
     {#3188
       +"Database": "laravel",
     },
   ]
>>> DB::select('show tables');
=> [
     {#3182
       +"Tables_in_laravel": "alumni",
     },
     {#3191
       +"Tables_in_laravel": "migrations",
     },
     {#3192
       +"Tables_in_laravel": "password_resets",
     },
     {#3179
       +"Tables_in_laravel": "users",
     },
   ]
>>> DB::select('describe alumni');
=> [
     {#3196
       +"Field": "id",
       +"Type": "bigint(20) unsigned",
       +"Null": "NO",
       +"Key": "PRI",
       +"Default": null,
       +"Extra": "auto_increment",
     },
     {#3195
       +"Field": "name",
       +"Type": "varchar(255)",
       +"Null": "NO",
       +"Key": "",
       +"Default": null,
       +"Extra": "",
     },
     {#3188
       +"Field": "email",
       +"Type": "varchar(255)",
       +"Null": "NO",
       +"Key": "",
       +"Default": null,
       +"Extra": "",
     },
     {#3194
       +"Field": "linkedin",
       +"Type": "varchar(255)",
       +"Null": "NO",
       +"Key": "",
       +"Default": null,
       +"Extra": "",
     },
     {#3192
       +"Field": "created_at",
       +"Type": "timestamp",
       +"Null": "YES",
       +"Key": "",
       +"Default": null,
       +"Extra": "",
     },
     {#3179
       +"Field": "updated_at",
       +"Type": "timestamp",
       +"Null": "YES",
       +"Key": "",
       +"Default": null,
       +"Extra": "",
     },
   ]
```

```
$ php artisan tinker
Psy Shell v0.9.9 (PHP 7.3.6 — cli) by Justin Hileman
>>> $luiz = [
...     'name' => 'Luiz Chaves',
...     'email' => 'luiz.chaves@ifpb.edu.br',
...     'linkedin' => 'https://www.linkedin.com/in/luizcrchaves/'
... ];
=> [
     "name" => "Luiz Chaves",
     "email" => "luiz.chaves@ifpb.edu.br",
     "linkedin" => "https://www.linkedin.com/in/luizcrchaves/",
   ]
>>> DB::table('alumni')->insert($luiz);
=> true
```

```
$ php artisan tinker
Psy Shell v0.9.9 (PHP 7.3.6 — cli) by Justin Hileman
>>> $leandro = [
...   'Leandro Almeida',
...   'leandro.almeida@ifpb.edu.br',
...   'https://www.linkedin.com/in/leandro-almeida-2601a611/'
... ];
=> [
     "Leandro Almeida",
     "leandro.almeida@ifpb.edu.br",
     "https://www.linkedin.com/in/leandro-almeida-2601a611/",
   ]
>>> DB::insert('insert into alumni (name, email, linkedin) values (?, ?, ?)', $leandro);
=> true
```

```
$ php artisan tinker
Psy Shell v0.9.9 (PHP 7.3.6 — cli) by Justin Hileman
>>> DB::table('alumni')->get()
=> Illuminate\Support\Collection {#3199
     all: [
       {#3189
         +"id": 1,
         +"name": "Luiz Chaves",
         +"email": "luiz.chaves@ifpb.edu.br",
         +"linkedin": "https://www.linkedin.com/in/luizcrchaves/",
         +"created_at": null,
         +"updated_at": null,
       },
       {#3193
         +"id": 2,
         +"name": "Leandro Almeida",
         +"email": "leandro.almeida@ifpb.edu.br",
         +"linkedin": "https://www.linkedin.com/in/leandro-almeida-2601a611/",
         +"created_at": null,
         +"updated_at": null,
       },
     ],
   }
```

```
>>> DB::select('select * from alumni')
=> [
     {#3194
       +"id": 1,
       +"name": "Luiz Chaves",
       +"email": "luiz.chaves@ifpb.edu.br",
       +"linkedin": "https://www.linkedin.com/in/luizcrchaves/",
       +"created_at": null,
       +"updated_at": null,
     },
     {#894
       +"id": 2,
       +"name": "Leandro Almeida",
       +"email": "leandro.almeida@ifpb.edu.br",
       +"linkedin": "https://www.linkedin.com/in/leandro-almeida-2601a611/",
       +"created_at": null,
       +"updated_at": null,
     },
   ]
```

**resources/views/alumni/index.blade.php**

```php
<ul>
@foreach ($alumni as $a)
    <li>{{ $a->name }}</li>
@endforeach
</ul>
```

```
$ docker-compose exec app php artisan make:model Alumnus
```

```
$ docker-compose exec app php artisan make:model Alumnus -m
```

**app/Alumnus.php**

```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnus extends Model
{
    protected $fillable = [
        'name',
        'email',
        'linkedin'
    ];
}
```

```
$ php artisan tinker
Psy Shell v0.9.9 (PHP 7.3.6 — cli) by Justin Hileman
>>> App\Alumnus::all();
=> Illuminate\Database\Eloquent\Collection {#3193
     all: [
       App\Alumnus {#3194
         id: 1,
         name: "Luiz Chaves",
         email: "luiz.chaves@ifpb.edu.br",
         linkedin: "https://www.linkedin.com/in/luizcrchaves/",
         created_at: null,
         updated_at: null,
       },
       App\Alumnus {#3195
         id: 2,
         name: "Leandro Almeida",
         email: "leandro.almeida@ifpb.edu.br",
         linkedin: "https://www.linkedin.com/in/leandro-almeida-2601a611/",
         created_at: null,
         updated_at: null,
       },
     ],
   }
```
