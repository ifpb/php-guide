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
