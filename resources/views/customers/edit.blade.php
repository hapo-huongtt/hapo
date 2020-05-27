@extends('layouts.adminLte')
@section('content')

<div class="row">
    <div class="container">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title h4">Update Customer</h3>
                </div>
                <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label>Avatar</label>
                            <input type="file" class="form-control" name="image" value="{{ old('image', $customer->image) }}">
                            @error('image')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label>customer_name</label>
                            <input type="text" class="form-control" name="customer_name" autocomplete="off" placeholder="Enter gender" value="{{ old('name', $customer->customer_name) }}">
                            @error('customer_name')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" autocomplete="off" placeholder="Enter address" value="{{ old('address', $customer->address) }} ">
                            @error('address')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" autocomplete="off" placeholder="Enter account" value="{{ old('phone', $customer->phone) }} ">
                            @error('phone')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Enter email" value="{{ old('email', $customer->email) }}">
                            @error('email')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
