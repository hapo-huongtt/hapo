@extends('layouts.adminLte')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Member</h3>
                </div>
                <form role="form" id="quickForm" action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label>Name<span style="color:red; font-weight:bold;">*</span></label>
                            <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Enter name" value="{{ old('name') }}">
                            @error('name')
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
                        <div class="form-group">
                            <label>Age<span style="color:red; font-weight:bold;">*</span></label>
                            <input type="text" class="form-control" name="age" autocomplete="off" placeholder="Enter age" value="{{ old('age') }}">
                            @error('age')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="exampleFormControlSelect1" class="col-form-label">Gender</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                <option>No</option>
                                <option value="1">Famale</option>
                                <option value="2">Male</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phone<span style="color:red; font-weight:bold;">*</span></label>
                            <input type="text" class="form-control" name="phone" autocomplete="off" placeholder="Enter phone" value="{{ old('phone') }}">
                            @error('phone')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Address<span style="color:red; font-weight:bold;">*</span></label>
                            <input type="text" class="form-control" name="address" autocomplete="off" placeholder="Enter address" value="{{ old('address') }}">
                            @error('address')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password<span style="color:red; font-weight:bold;">*</span></label>
                            <input type="password" class="form-control" name="password" autocomplete="current-password" placeholder="Enter password">
                            @error('password')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role">
                                @foreach(App\Models\Member::ROLE as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('members.index') }}" class="btn btn-danger float-right">Cancel</a>
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
