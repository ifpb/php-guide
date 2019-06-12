@extends('layout')

@section('title', 'Alumni')

@section('content')
<h1>Alumni</h1>
<ul>
  @foreach ($alumni as $a)
  <li>{{ $a->name }}</li>
  @endforeach
</ul>
@endsection