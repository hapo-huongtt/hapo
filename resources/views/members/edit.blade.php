@extends('layouts.adminLte')
@section('content')
<div class="row">
    <div class="container">
        <div class="col md-12">
            <div class="card card-info justify-content-center">
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
                        <div class="form-group row ">
                            <label for="exampleFormControlSelect1" class=" col-form-label ">Gender</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                <option>No</option>
                                <option value="1">Famale</option>
                                <option value="2">Male</option>
                            </select>
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
                            <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Enter password" value="{{ $member->password }}">
                            @error('password')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <!-- <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label">{{ __('Password') }}</label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> -->
                        <!-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Confirm Password') }}</label>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label>Role</label>
                            <select name="role">
                                @foreach(App\Models\Member::ROLE as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ route('members.index') }}" class="btn btn-success">Cancel</a>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
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
    </div>
</div>
@endsection