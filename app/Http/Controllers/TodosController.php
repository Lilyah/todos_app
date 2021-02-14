<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        // fetch all todos from the db
        // display the in the todos.index page
        // view('todos.index'): todos folder, index.blade.php
        // with('todos'.$todos): todos is KEY in view with VALUE/the data $todos = Todo::all()
        // all() fetch all the records from the db
        return view('todos.index')->with('todos', Todo::all()); 
    }

    //public function show($todoId) //$todo is the {todo} from web.php
    // { 
    //$todo = Todo::find($todoId);
    public function show(Todo $todo) //$todo is the {todo} from web.php
    {
        return view('todos.show')->with('todo', $todo);
    }

    public function create() 
    {
        return view('todos.create');
    }

    public function store() 
    {
        //validating the info coming from the user
        //user SHALL NOT PASS if some fields are empty 
        $this->validate(request(), [
            'name' => 'required|min:6|max:12', //can add more validation rules than one
            'description' => 'required'
        ]);

        $data = request()->all();
        $todo = new Todo();
        $todo->name = $data['name']; //$data['name'] comes from the form; $todo is the model in the code; ->name will corespond to the field in db
        $todo->description = $data['description'];
        $todo->completed = false;
        $todo->save(); //this will save the query in the db

        session()->flash('success', 'Todo created successfully.');


        return redirect('/todos'); //this will redirect the user to the view with table ot all records
    }

    public function edit(Todo $todo) //$todo is the {todo} from web.php
    {
        // $todo = Todo::find($todoId);

        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo) 
    {
        //validating the info coming from the user
        //user SHALL NOT PASS if some fields are empty 
        $this->validate(request(), [
            'name' => 'required|min:6|max:12', //can add more validation rules than one
            'description' => 'required'
        ]);

        $data = request()->all();
        // $todo = Todo::find($todoId);
        $todo->name = $data['name']; //$data['name'] comes from the form; $todo is the model in the code; ->name will corespond to the field in db
        $todo->description = $data['description'];
        $todo->save(); //this will save the query in the db

        session()->flash('success', 'Todo updated successfully.');

        return redirect('/todos'); //this will redirect the user to the view with table ot all records
    }

    public function destroy(Todo $todo) 
    {
        //$todo = Todo::find($todoId);
        $todo->delete();

        session()->flash('success', 'Todo deleted successfully.');

        return redirect('/todos'); //this will redirect the user to the view with table ot all records
    }

    public function complete(Todo $todo) 
    {
        //$todo = Todo::find($todoId);
        $todo->completed = true;
        $todo->save(); //this will save the query in the db


        session()->flash('success', 'Todo completed successfully.');

        return redirect('/todos'); //this will redirect the user to the view with table ot all records
    }



}
