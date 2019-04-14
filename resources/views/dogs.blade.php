@extends('layout')

@section('content')

<div class="title m-b-md">
    All Dogs
</div>

<ul style="list-style-type:none;">
  @foreach ($dogs as $key=> $dog)
    <li><a href="/dogs/{{ $key + 1 }}">{{ $dog }}</a></li>
  @endforeach
</ul>

@endsection