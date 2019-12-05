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
{% raw %}
@extends('layout')

@section('title', 'Alumnus')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><br />
@endif
<table class="table table-striped">
  <thead>
    <tr>
      <td>ID</td>
      <td>Name</td>
      <td>Email</td>
      <td>Linkedin</td>
      <td colspan="2">Action</td>
    </tr>
  </thead>
  <tbody>
    @foreach($alumni as $alumni)
    <tr>
      <td>{{$alumni->id}}</td>
      <td>{{$alumni->name}}</td>
      <td>{{$alumni->email}}</td>
      <td>{{$alumni->linkedin}}</td>
      <td><a href="{{ route('alumni.edit', $alumni->id) }}" class="btn btn-primary" role="button">Edit</a></td>
      <td>
        <form action="{{ route('alumni.destroy', $alumni->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="{{ route('alumni.create') }}" class="btn btn-primary" role="button">Add alumnus</a>
@endsection
{% endraw %}
```

[resources/views/alumni/create.blade.php](https://github.com/ifpb/php-guide/tree/master/packages/laravel/crud/project/resources/views/alumni/create.blade.php)

```php
{% raw %}
@extends('layout')

@section('title', 'Create Alumnus')

@section('content')
<div class="card">
  <div class="card-header">
    Add Alumnus
  </div>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form method="post" action="{{ route('alumni.store') }}">
      <div class="form-group">
        @csrf
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" />
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" />
      </div>
      <div class="form-group">
        <label for="linkedin">Linkedin:</label>
        <input type="text" class="form-control" id="linkedin" name="linkedin" />
      </div>
      <button type="submit" class="btn btn-primary">Create Alumnus</button>
    </form>
  </div>
</div>
@endsection
{% endraw %}
```

[resources/views/alumni/edit.blade.php](https://github.com/ifpb/php-guide/tree/master/packages/laravel/crud/project/resources/views/alumni/edit.blade.php)

```php
{% raw %}
@extends('layout')

@section('title', 'Edit Alumnus')

@section('content')
<div class="card">
  <div class="card-header">
    Edit Alumnus
  </div>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form method="post" action="{{ route('alumni.update', $alumnus) }}">
      <div class="form-group">
        @csrf
        @method('PATCH')
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $alumnus->name }}" />
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $alumnus->email }}" />
      </div>
      <div class="form-group">
        <label for="linkedin">Linkedin:</label>
        <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ $alumnus->linkedin }}" />
      </div>
      <button type="submit" class="btn btn-primary">Update Alumnus</button>
    </form>
  </div>
</div>
@endsection
{% endraw %}
```

## References

---

- [Laravel 5.8 CRUD Tutorial With Example For Beginners](https://appdividend.com/2019/03/08/laravel-5-8-crud-tutorial-with-example-for-beginners/)
- [Laravel 5.7 CRUD Example Tutorial For Beginners From Scratch](https://appdividend.com/2018/09/06/laravel-5-7-crud-example-tutorial/)
- [Laravel 5 Cheat Sheet](https://learninglaravel.net/cheatsheet/)
