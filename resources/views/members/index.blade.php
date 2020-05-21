@extends('layouts.adminLte')
@section('content')

<div class="'row">
    <div class="container">
        <div class="col-lg-12" style="text-align: center">
            <h1>Member</h1>
        </div>
        <div class="col-lg-12 margin-tb p-3">
            <div class="pull-left">
                <a class="btn btn-primary float-left " href="{{ route('members.create')}}">New member</a>
            </div>
        </div>
        <!-- <div class="col-8 form-group">
            <form action="{{ route('members.index') }}" method="GET">
                <div class="input-group">
                    <input type="search" name="searchByName" placeholder="Tên" class="form-control" value="{{ old('searchByName') }}" autocomplete="off">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </form>
        </div> -->
        <br />
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p id="msg">{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="text-center"><strong>ID</strong></td>
                    <td class="text-center"><strong>Avatar</strong></td>
                    <td class="text-center"><strong>Name</strong></td>
                    <td class="text-center"><strong>Email</strong></td>
                    <td class="text-center"><strong>Age</strong></td>
                    <td class="text-center"><strong>Gender</strong></td>
                    <td class="text-center"><strong>Phone</strong></td>
                    <td class="text-center"><strong>Address</strong></td>
                    <td class="text-center"><strong>Role</strong></td>
                    <td colspan=3 class="text-center"><strong>Action</strong></td>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td class="text-center">{{$member->id}}</td>
                    <td class="text-center"><img src="{{ $member->image }}" style="width:70px; height:70px"></td>
                    <td class="text-center">{{$member->name}}</td>
                    <td class="text-center">{{$member->email}}</td>
                    <td class="text-center">{{$member->age}}</td>
                    @if ($member->gender == 1)
                    <td class="text-center">Male</td>
                    @else
                    <td class="text-center">Female</td>
                    @endif
                    <td class="text-center">{{$member->phone}}</td>
                    <td class="text-center">{{$member->address}}</td>
                    <td class="text-center">{{$member->role}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('members.show',$member->id)}}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('members.edit',$member->id)}}">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('members.destroy',$member->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection