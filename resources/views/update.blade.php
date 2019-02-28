@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('todo.update', ['id' => $todo->id ]) }}" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="todo" class="form-control form-control-lg" value="{{ $todo->todo }}">
                </form>
            </div>
        </div>
    </div>

@endsection
