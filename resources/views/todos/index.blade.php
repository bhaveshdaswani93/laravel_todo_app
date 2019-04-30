@extends('layouts.app')
@section('content')
        <h1 class="text-center mt-5">Todos</h1>
        <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="card card-default">
                    <div class="card-header">
                      Todos
                    </div>
                    <div class="card-body">
                            <ul class="list-group">
                                    @foreach ($todos as $todo)
                                    <li class="list-group-item">
                                        {{ $todo->name }}    
                                    <a href="todos/{{ $todo->id }}" class="btn btn-primary btn-sm float-right">View</a>
                                    @if($todo->completed === 0)
                                      <a href="todos/{{ $todo->id }}/complete-todo" class="btn btn-info btn-sm float-right">Complete Todo</a>
                                    @endif
                                    </li>
                                @endforeach
                                </ul>
                    </div>
                  </div>
                </div>
               
            </div>
    @endsection