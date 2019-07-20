@extends('layouts.app')

@section('title', '')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div><br />
@endif

<form class="form-inline my-2 float-left">
  Show
  <select class="form-control mx-2" name='per_page' onchange='this.form.submit()'>
    @foreach([5, 10, 20] as $page)
    <option value="{{ $page }}" {{ ($page == $per_page) ? 'selected' : '' }}>{{ $page }}</option>
    @endforeach
  </select>
  Entries
</form>

<form class="form-inline my-2 float-right">
  <input class="form-control mr-2" type="search" name="search" value="{{ $search }}" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-info" type="submit">Search</button>
</form>

<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>@sortablepagelink('name')</th>
      <th>@sortablepagelink('email')</th>
      <th>@sortablepagelink('linkedin')</th>
      @auth
      <th colspan="2">Action</th>
      @endauth
    </tr>
  </thead>
  <tbody>
    @foreach($alumni as $index=>$alumnus)
    <tr>
      <td class="align-middle">{{ ($alumni->currentpage() - 1) * $alumni->perpage() + $index + 1 }}</td>
      <td class="align-middle">{{ $alumnus->name }}</td>
      <td class="align-middle">{{ $alumnus->email }}</td>
      <td class="align-middle"><a href="{{ $alumnus->linkedin }}">{{ $alumnus->linkedin }}</a></td>
      @auth
      <td><a href="{{ route('alumni.edit', $alumnus->id) }}" class="btn btn-primary btn-sm" role="button">Edit</a></td>
      <td>
        <form class="delete" action="{{ route('alumni.destroy', $alumnus->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm" type="submit">Delete</button>
        </form>
      </td>
      @endauth
    </tr>
    @endforeach
  </tbody>
</table>

{{ $alumni->links() }}

@auth
<a href="{{ route('alumni.create') }}" class="btn btn-primary" role="button">Create</a>
@endauth

@endsection

@section('script')
<script>
  $(function() {
    $('.delete').on('submit', function() {
      return confirm('Are you sure?');
    });
  });
</script>
@endsection