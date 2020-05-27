@extends('layouts.adminLte')

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Task</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="name">task_name:</label>
            <p type="text" class="form-control">{{ $task->task_name}}</h3>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <p type="text" class="form-control">{{ $task->description}}</p>
        </div>
        <div class="form-group">
            <label for="status_id">Status:</label>
            @if($task->status_id === \App\Models\Member::STATUS_PENDING)
            <p type="text" class="form-control">Pending</b></p>
            @else
            <p type="text" class="form-control">Completed</b></p>
            @endif
        </div>
        <div class="form-group">
            <label for="member_id">Member_id:</label>
            <p type="text" class="form-control">{{ $task->members->name}}</b></p>
        </div>
        <div class="form-group">
            <label for="began_at">Began_at:</label>
            <p type="date" class="form-control">{{ $task->began_at}}</b></p>
        </div>
        <div class="form-group">
            <label for="finished_at">Finished_at:</label>
            <p type="date" class="form-control">{{ $task->finished_at}}</b></p>
        </div>
        <td colspan="2" style="text-align: right "><a href="{{ route('tasks.index') }}" class="btn btn-danger">OK</a>
    </div>
</div>

@endsection
