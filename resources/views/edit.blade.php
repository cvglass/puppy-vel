@extends('layout')

@section('content')

<div class="title m-b-md">
    Edit {{ $dog->name }}
</div>

<form method="POST" action="/dogs/{{ $dog->id }}" style="margin-bottom: 1em">
  {{ method_field('PATCH') }}
  {{ csrf_field() }}

  <div class="field">
    <label class="label" for="name">Name</label>
    <div class="control">
      <input type="text" class="input" name="name" value={{ $dog->name }}>
    </div>
  </div>

  <div class="field">
    <label class="label" for="age">Age</label>
    <div class="control">
      <input type="number" min="1" class="input" name="age" value={{ $dog->age }}>
    </div>
  </div>

  <div class="field">
    <label class="label" for="weight">Weight</label>
    <div class="control">
      <input type="number" min="1" class="input" name="weight" value={{ $dog->weight }}>
    </div>
  </div>

  <div class="field">
    <label class="label" for="breed">Breed</label>
    <div class="control">
      <input type="text" class="input" name="breed" value={{ $dog->breed }}>
    </div>
  </div>

  <div class="field">
    <div class="control">
      <button type="submit" class="button is-link">Update</button>
    </div>
  </div>
</form>

<form method="POST" action="/dogs/{{ $dog->id }}" style="margin-bottom: 1em">
  {{ method_field('DELETE') }}
  {{ csrf_field() }}

  <div class="field">
    <div class="control">
      <button type="submit" class="button">Delete</button>
    </div>
  </div>
</form>

@endsection
