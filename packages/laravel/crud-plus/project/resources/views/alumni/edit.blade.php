@extends('layouts.app')

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
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection