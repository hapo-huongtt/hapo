@extends('layouts.adminLte')

@section('content')

<div class="card">
    <div class="card-body">
        <h2>Project</h2>
        <div class="form-group">
            <label for="name">project_name:</label>
            <p type="text" class="form-control">{{ $project->project_name}}</h3>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <p type="text" class="form-control">{{ $project->description}}</p>
        </div>
        <div class="form-group">
            <label for="status_id">Status:</label>
            @if($project->status_id === \App\Models\Member::STATUS_PENDING)
            <p type="text" class="form-control">Pending</b></p>
            @else
            <p type="text" class="form-control">Completed</b></p>
            @endif
        </div>
        <div class="form-group">
            <label for="member">member:</label>
            <p type="text">
                @foreach($project->members as $member)
                <ul>
                    <li style="list-style-type:none">
                        {{$member->name}}
                    </li>
                </ul>
                @endforeach
            </p>
        </div>
        <div class="form-group">
            <label for="customer_id">Customer:</label>
            <p type="text" class="form-control">{{ $project->customer_name}}</p>
        </div>
        <div class="form-group">
            <label for="began_at">Began_at:</label>
            <p type="date" class="form-control">{{ $project->began_at}}</b></p>
        </div>
        <div class="form-group">
            <label for="finished_at">Finished_at:</label>
            <p type="date" class="form-control">{{ $project->finished_at}}</b></p>
        </div>
        <td colspan="2" style="text-align: right "><a href="{{ route('members.index') }}" class="btn btn-danger">OK</a>
    </div>
</div>

@endsection
