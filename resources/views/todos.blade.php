@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <form action="/todo/create" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="todo" class="form-control form-control-lg">
                </form>
            </div>
        </div>
    </div>
    <hr>
    @foreach($todos as $todo)
        @if($todo->completed)
        <s>
        @endif
        {{ $todo->todo }}
        @if($todo->completed)
        </s>
        @endif
        <a href="{{ route('todo.edit', [ 'id' => $todo->id ]) }}" class="btn btn-info">
            <svg id="i-edit" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M30 7 L25 2 5 22 3 29 10 27 Z M21 6 L26 11 Z M5 22 L10 27 Z" />
            </svg>
        </a>
        <a href="{{ route('todo.delete', [ 'id' => $todo->id ]) }}" class="btn btn-danger">
          <svg id="i-close" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
           <path d="M2 30 L30 2 M30 30 L2 2" />
          </svg>
        </a>
        
        @if(!$todo->completed)
           <a href="{{ route('todo.complete', ['id' => $todo->id ])}}" class="btn btn-success">
          <svg id="i-checkmark" viewBox="0 0 32 32" width="14" height="14" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <path d="M2 20 L12 28 30 4" />
          </svg>
        </a>
        @endif
        
        <hr>
    @endforeach
@stop
