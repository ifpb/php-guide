@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    Edit Alumnus
  </div>
  <div class="card-body">
    <!-- @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="m-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif -->
    <form method="post" action="{{ route('alumni.update', $alumnus) }}">
      <div class="form-group">
        @csrf
        @method('PATCH')
        <label for="name">Name:</label>
        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ $errors->has('name') ? old('name') : $alumnus->name }}" />
        @if ($errors->has('name'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ $errors->has('email') ? old('email') : $alumnus->email }}" />
        @if ($errors->has('email'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
      </div>
      <div class="form-group">
        <label for="linkedin">Linkedin:</label>
        <input type="text" class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" id="linkedin" name="linkedin" value="{{ $errors->has('linkedin') ? old('linkedin') : $alumnus->linkedin }}" />
        @if ($errors->has('linkedin'))
        <span class="invalid-feedback">
          <strong>{{ $errors->first('linkedin') }}</strong>
        </span>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection