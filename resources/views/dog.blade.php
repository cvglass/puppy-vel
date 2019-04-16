@extends('layout')

@section('content')

<div class="title m-b-md">
  {{ $dog->name }}
</div>

<p>Age: {{ $dog->age }} {{ $dog->age > 1 ? "years" : "year" }}</p>
<p>Weight: {{ $dog->weight }}lbs</p>
<p>Breed: {{ $dog->breed }}</p>
<div class="box">
  <img src="{{json_decode($response)->message[0]}}">
</div>
<form method="GET" action="/dogs/{{ $dog->id }}/edit">
  {{ csrf_field() }}

  <div class="field is-grouped is-grouped-centered">
    <div class="control">
      <button type="submit" class="button is-link">Edit</button>
    </div>
  </div>
</form>
@endsection