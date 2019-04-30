<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index()
    {

        return view('todos.index')->with('todos',Todo::all());
    }

    public function show($todoId)
    {
        return view('todos.show')->with('todo',Todo::find($todoId));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        $this->validate(request(),[
            'name'=>'required|min:6|max:15',
            'description' => 'required'
        ]);

        $data = request()->all();
        $todo = new Todo;
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed =false;
        $todo->save();
        session()->flash('success','Todo created successfully');
        return redirect(url('todos'));
    }

    public function edit (Todo $todo)
    {
        return view('todos.edit')->with('todo',$todo);
    }

    public function updata(Todo $todo)
    {
        $this->validate(request(),[
            'name'=>'required|min:6|max:15',
            'description' => 'required'
        ]);

        $data = request()->all();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();
        session()->flash('success','Todo updated successfully');
        return redirect(url('todos'));
        
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        session()->flash('success','Todo deleted successfully');
        return redirect(url('todos'));
    }

    public function completeTodo(Todo $todo)
    {
        $todo->completed = 1;
        $todo->save();
        session()->flash('success','Todo completed successfully');
        return redirect(url('todos'));
    }
}
