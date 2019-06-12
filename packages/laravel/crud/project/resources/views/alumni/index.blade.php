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