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