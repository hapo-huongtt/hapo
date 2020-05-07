@extends('layouts.adminLte')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-sm-8 offset-sm-2">
            <h2  style="text-align: left">Add a task</h2>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
        </br>
        @endif
        <div class="col-xs-6 col-sm-6 col-md-6 text-center">
            <form method="post" action="{{ route('tasks.store') }}">
                @csrf
                <div class="form-group">
                    <strong>Task_name:</strong>
                    <input type="text" name="task_name" id="task_name" class="form-control" placeholder="Task_name" onchange="validate()">
                </div>
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Description" onchange="validate()">
                </div>
                <div class="form-group">
                    <strong>Status:</strong>
                    <input type="text" name="status" id="status" class="form-control" placeholder="Status" onchange="validate()" onkeypress="validate()">
                </div>
                <button type="submit" class="btn btn-primary">Add task</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-success">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection
