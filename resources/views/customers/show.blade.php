@extends('layouts.adminLte')

@section('content')

<div class="card">
    <div class="card-body">
        <h2>task</h2>
        <div class="form-group">
            <label for="name">Task_name:</label>
            <p type="text" class="form-control">{{ $task->task_name}}</h3>        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <p type="text" class="form-control">{{ $task->description}}</p>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <p type="text" class="form-control">{{ $task->status}}</b></p>
        </div>
        <td colspan="2" style="text-align: right "><a href="{{ route('tasks.index') }}" class="btn btn-danger">OK</a>
    </div>
</div>

@endsection
