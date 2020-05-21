@extends('layouts.adminLte')
@section('content')

<div class="row">
    <div class="container">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Customer</h3>
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
                <form role="form" id="quickForm" action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="image">Avatar</label>
                            <input type="file" class="form-control" name="image" autocomplete="off" placeholder="Enter image" value="{{ old('image') }}">
                            @error('image')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Customer_name</label>
                            <input type="text" class="form-control" name="customer_name" autocomplete="off" placeholder="Enter customer_name" value="{{ old('customer_name') }}">
                            @error('customer_name')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" autocomplete="off" placeholder="Enter address" value="{{ old('address') }}">
                            @error('address')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" autocomplete="off" placeholder="Enter phone" value="{{ old('phone') }}">
                            @error('phone')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Enter email" value="{{ old('email') }}">
                            @error('email')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('customers.index') }}" class="btn btn-danger float-right">Cancel</a>
                    </div>
                </form>
            </div>
            <div class="col-sm-12">
                @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success')}}
                </div>
                @endif
            </div>
        </div>

        @endsection