@extends('layouts.adminLte')

@section('content')

<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">Customer</h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="name">Customer_name:</label>
            <p type="text" class="form-control">{{ $customer->customer_name}}</h3>
        </div>
        <div class="form-group">
            <label for="name">Avatar:</label>
            <td class="text-center"><img src="{{ asset($customer->image) }}" style="width:70px; height:70px"></td>
        </div>
        <div class="form-group">
            <label for="status">Address:</label>
            <p type="text" class="form-control">{{ $customer->address}}</b></p>
        </div>
        <div class="form-group">
            <label for="status">Phone:</label>
            <p type="text" class="form-control">{{ $customer->phone}}</b></p>
        </div>
        <div class="form-group">
            <label for="status">Email:</label>
            <p type="text" class="form-control">{{ $customer->email}}</b></p>
        </div>
        <div class="form-group">
            <label for="address">Project:</label>
            <p type="text">
                @foreach($customer->projects as $project)
                <ul>
                    <li style="list-style-type:none">
                        {{$project->project_name}}
                    </li>
                </ul>
                @endforeach</b></p>
        </div>
        <td colspan="2" style="text-align: right "><a href="{{ route('tasks.index') }}" class="btn btn-danger">OK</a>
    </div>
</div>

@endsection
