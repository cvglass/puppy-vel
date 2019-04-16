@extends('layout')

@section('content')

<div class="title m-b-xs">
    All Dogs
</div>

<ul style="list-style-type:none;">
  @foreach ($dogs as $dog)
    <li><a href="/dogs/{{ $dog->id }}">{{ $dog->name }}</a></li>
  @endforeach
</ul>

@endsection