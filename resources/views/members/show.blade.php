@extends('layouts.adminLte')
@section('content')

<div class="container">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Member</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="avatar">Avatar:</label>
                <p type="file" class="form-control">{{ $members->image}}</h3>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <p type="text" class="form-control">{{ $members->name}}</h3>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <p type="text" class="form-control">{{ $members->email}}</p>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <p type="text" class="form-control">{{ $members->age}}</b></p>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <p type="text" class="form-control">{{ $members->gender}}</h3>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <p type="text" class="form-control">{{ $members->phone}}</p>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <p type="text" class="form-control">{{ $members->address}}</b></p>
            </div>
            <div class="form-group">
                <label for="address">Task:</label>
                <p type="text">
                    @foreach($members->tasks as $task)
                    <ul>
                        <li style="list-style-type:none">
                            {{$task->task_name}}
                        </li>
                    </ul>
                    @endforeach</b></p>
            </div>
            <div class="form-group">
                <label for="address">Project:</label>
                <p type="text">
                    @foreach($members->projects as $project)
                    <ul>
                        <li style="list-style-type:none">
                            {{$project->project_name}}
                        </li>
                    </ul>
                    @endforeach</b></p>
            </div>
            <td colspan="2" style="text-align: right "><a href="{{ route('members.index') }}" class="btn btn-danger">OK</a>
        </div>
    </div>
</div>

@endsection
