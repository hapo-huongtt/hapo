@extends('layouts.adminLte')
@section('content')
<div class="row">
    <!-- <div class="col-sm-8 offset-sm-2">
        <h2>Update a member</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label>Avatar</label>
                <input type="file" class="form-control" name="image" value="{{ $member->image }}">
                @error('image')
                <strong class="alert text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group row">
                <label>Name</label>
                <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Enter name" value="{{ $member->name }}">
                @error('name')
                <strong class="alert text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group row">
                <label>Email</label>
                <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Enter email" value="{{ $member->email }}">
                @error('email')
                <strong class="alert text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group row">
                <label>Age</label>
                <input type="age" class="form-control" name="age" autocomplete="off" placeholder="Enter age" value="{{ $member->age }}">
                @error('age')
                <strong class="alert text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group row">
                <label>Gender</label>
                <input type="gender" class="form-control" name="gender" autocomplete="off" placeholder="Enter gender" value="{{ $member->gender }}">
                @error('gender')
                <strong class="alert text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group row">
                <label>Phone</label>
                <input type="phone" class="form-control" name="phone" autocomplete="off" placeholder="Enter phone" value="{{ $member->phone }}">
                @error('phone')
                <strong class="alert text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group row">
                <label>Address</label>
                <input type="address" class="form-control" name="address" autocomplete="off" placeholder="Enter address" value="{{ $member->address }}">
                @error('address')
                <strong class="alert text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group row">
                <label>Password</label>
                <input type="password" class="form-control" name="password" autocomplete="current-password" placeholder="Enter password" value="{{ $member->password }}">
                @error('password')
                <strong class="alert text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div> -->
    <div class="card card-info d-flex justify-content-center" >
        <div class="card-header d-flex justify-content-center">
            <h3 class="card-title">Update a member</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            <br />
            @endif
        </div>
        <form class="form-horizontal" action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label>Avatar</label>
                    <input type="file" class="form-control" name="image" value="{{ $member->image }}">
                    @error('image')
                    <strong class="alert text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group row">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Enter name" value="{{ $member->name }}">
                    @error('name')
                    <strong class="alert text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group row">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" autocomplete="off" placeholder="Enter email" value="{{ $member->email }}">
                    @error('email')
                    <strong class="alert text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group row">
                    <label>Age</label>
                    <input type="age" class="form-control" name="age" autocomplete="off" placeholder="Enter age" value="{{ $member->age }}">
                    @error('age')
                    <strong class="alert text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group row">
                    <label>Gender</label>
                    <input type="gender" class="form-control" name="gender" autocomplete="off" placeholder="Enter gender" value="{{ $member->gender }}">
                    @error('gender')
                    <strong class="alert text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group row">
                    <label>Phone</label>
                    <input type="phone" class="form-control" name="phone" autocomplete="off" placeholder="Enter phone" value="{{ $member->phone }}">
                    @error('phone')
                    <strong class="alert text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group row">
                    <label>Address</label>
                    <input type="address" class="form-control" name="address" autocomplete="off" placeholder="Enter address" value="{{ $member->address }}">
                    @error('address')
                    <strong class="alert text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group row">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" autocomplete="current-password" placeholder="Enter password" value="{{ $member->password }}">
                    @error('password')
                    <strong class="alert text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
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