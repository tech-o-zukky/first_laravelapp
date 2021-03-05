<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    $items = Person::all();
    return view('person.index', ['items' => $items]);
}
