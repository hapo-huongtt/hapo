@extends('layouts.adminLte')

@section('content')

<div class="card">
    <div class="card-body">
        <h2>member</h2>
        <div class="form-group">
            <label for="name">name:</label>
            <p type="text" class="form-control">{{ $member->name}}</h3>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <p type="text" class="form-control">{{ $member->email}}</p>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <p type="text" class="form-control">{{ $member->age}}</b></p>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <p type="text" class="form-control">{{ $member->gender}}</h3>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <p type="text" class="form-control">{{ $member->phone}}</p>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <p type="text" class="form-control">{{ $member->address}}</b></p>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <p type="text" class="form-control">{{ $member->password}}</b></p>
        </div>
        <td colspan="2" style="text-align: right "><a href="{{ route('members.index') }}" class="btn btn-danger">OK</a>
    </div>
</div>

@endsection
