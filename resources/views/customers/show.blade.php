@extends('layouts.adminLte')

@section('content')

<div class="card">
    <div class="card-body">
        <h2>Customer</h2>
        <div class="form-group">
            <label for="name">Customer_name:</label>
            <p type="text" class="form-control">{{ $customer->customer_name}}</h3>
        </div>
        <div class="form-group">
            <label for="name">Avatar:</label>
            <p type="text" class="form-control">{{ $customer->image}}</h3>
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
        <td colspan="2" style="text-align: right "><a href="{{ route('tasks.index') }}" class="btn btn-danger">OK</a>
    </div>
</div>

@endsection