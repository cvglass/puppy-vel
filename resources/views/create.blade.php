@extends('layout')

@section('content')

<div class="title m-b-md">
    Send your dog
</div>

<form method="POST" action="/dogs">
  {{ csrf_field() }}
  <div>
    Name: <input type="text" name="name">
  </div>
  <div>
    Age: <input type="number" min="1" name="age">
  </div>
  <div>
    Weight: <input type="number" min="1" name="weight">
  </div>
  <div>
    Breed: <input type="text" name="breed">
  </div>
  <div>
    <button type="submit">Submit</button>
  </div>
</form>

@endsection