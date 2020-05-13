@extends('layouts.adminLte')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Customer</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label>Avatar</label>
                                <input type="file" class="form-control" name="image" autocomplete="off">
                                @error('image')
                                <strong class="alert text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <label>Customer_name</label>
                            <input type="text" class="form-control" name="customer_name" autocomplete="off" placeholder="Enter customer_name" value="{{ old('customer_name') }}">
                            @error('customer_name')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <input type="text" class="form-control" name="gender" autocomplete="off" placeholder="Enter gender" value="{{ old('gender') }}">
                            @error('gender')
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
                            <label>phone</label>
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
                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection