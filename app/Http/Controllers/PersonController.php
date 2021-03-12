<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class PersonController extends Controller
{
    public function index(Request $request) {
        $items = Person::all();
        return view('person.index', ['items' => $items]);
    }

    public function find(Request $request) {
        return view('person.find', ['input' => '']);
    }

    public function search(Request $request) {
        // 6-14
        $min = $request->input * 1;
        $max = $min + 10;
        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);

        // 6-11
        /*
        $item = Person::nameEqual($request->input)->first();
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
        */

        /*
        // 6-10
        $item = Person::where('name', $request->input)->first();
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
        */
        /* 
        $item = Person::find($request->input);
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
        */
    }

    public function add(Request $request)
    {
        return view('person.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = new Person;
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();

        return redirect('/person');
    }

    // 6-23
    public function edit(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.edit',['form' => $person]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = Person::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $person->fill($form)->save();

        return redirect('/person');
    }

    // 6-23
    public function delete(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.delete',['form' => $person]);
    }

    public function remove(Request $request)
    {
        $person = Person::find($request->id)->delete();

        return redirect('/person');
    }

}