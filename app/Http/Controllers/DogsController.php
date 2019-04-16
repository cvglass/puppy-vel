<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dog;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class DogsController extends Controller
{
    public function show($id)
    {
      $dog = Dog::find($id);
      $client = new Client();

      $promise = $client->getAsync("https://dog.ceo/api/breed/".$dog->breed."/images")->then(
        function ($response) {
            return $response->getBody();
        }, function ($exception) {
            return $exception->getMessage();
        }
      );
      $response = $promise->wait();

      return view('dog', [
        'dog' => $dog,
        'response' => $response
      ]);
    }

    public function index()
    {
      $dogs = Dog::all();
      return view('dogs', [
        'dogs' => $dogs
      ]);
    }

    public function create()
    {
      $client = new Client();

      $promise = $client->getAsync("https://dog.ceo/api/breeds/list/all")->then(
        function ($response) {
            return $response->getBody();
        }, function ($exception) {
            return $exception->getMessage();
        }
      );
      $response = $promise->wait();
      $breeds = array_keys((array)json_decode($response)->message);

      return view('create', [
        'breeds' => $breeds
      ]);
    }

    public function store()
    {
      $dog = new Dog();

      $unformatted_name = request('name');
      $name = ucfirst(strtolower($unformatted_name));

      $dog->name = $name;
      $dog->age = request('age');
      $dog->weight = request('weight');
      $dog->breed = request('breed');

      $dog->save();
      return redirect('/dogs');
    }

    public function update($id)
    {
      $dog = Dog::find($id);
      
      $unformatted_name = request('name');
      $name = ucfirst(strtolower($unformatted_name));
      $dog->name = $name;
      $dog->age = request('age');
      $dog->weight = request('weight');
      $dog->breed = request('breed');

      $dog->save();
      return redirect('/dogs');
    }

    public function edit($id)
    {
      $dog = Dog::find($id);
      $client = new Client();

      $promise = $client->getAsync("https://dog.ceo/api/breeds/list/all")->then(
        function ($response) {
            return $response->getBody();
        }, function ($exception) {
            return $exception->getMessage();
        }
      );
      $response = $promise->wait();
      $breeds = array_keys((array)json_decode($response)->message);

      return view('edit',  [
        'dog' => $dog,
        'breeds' => $breeds
      ]);
    }

    public function destroy($id)
    {
      $dog = Dog::find($id);
      $dog->delete();
      return redirect('/dogs');
    }
}
