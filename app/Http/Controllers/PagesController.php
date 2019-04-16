<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dog;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PagesController extends Controller
{
    public function home()
    {
      return view('welcome');
    }

    public function show($id)
    {
      $dog = Dog::find($id);
      $client = new Client();
      $result = null;

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
      return view('create');
    }

    public function store()
    {
      $dog = new Dog();

      $dog->name = request('name');
      $dog->age = request('age');
      $dog->weight = request('weight');
      $dog->breed = request('breed');

      $dog->save();
      return redirect('/dogs');
    }

    public function update($id)
    {
      $dog = Dog::find($id);

      $dog->name = request('name');
      $dog->age = request('age');
      $dog->weight = request('weight');
      $dog->breed = request('breed');

      $dog->save();
      return redirect('/dogs');
    }

    public function edit($id)
    {
      $dog = Dog::find($id);

      return view('edit',  [
        'dog' => $dog
      ]);
    }

    public function destroy($id)
    {
      $dog = Dog::find($id);
      $dog->delete();
      return redirect('/dogs');
    }
}
