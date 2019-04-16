@extends('layout')

@section('content')

<div class="title m-b-md">
    Send your dog
</div>

<form method="POST" action="/dogs">
  {{ csrf_field() }}

  <div class="field">
    <label class="label" for="name">Name</label>
    <div class="control">
      <input type="text" class="input" name="name">
    </div>
  </div>

  <div class="field">
    <label class="label" for="age">Age</label>
    <div class="control">
      <input type="number" min="1" class="input" name="age">
    </div>
  </div>

  <div class="field">
    <label class="label" for="weight">Weight</label>
    <div class="control">
      <input type="number" min="1" class="input" name="weight">
    </div>
  </div>

  <div class="field">
    <label class="label" for="breed">Breed</label>
    <div class="control">
      <div class="select">
        <select class="input" name="breed">
        @foreach ($breeds as $breed)
          <option>{{ $breed }}</option>
        @endforeach
        </select>
      </div>
    </div>
  </div>

  <div class="field">
    <div class="control">
      <button type="submit" class="button is-link">Submit</button>
    </div>
  </div>
</form>

@endsection