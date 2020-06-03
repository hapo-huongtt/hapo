@extends('layouts.adminLte')

@section('content')

<div class="'row">
    <div class="container">
        <div class="col-lg-12" style="text-align: center">
            <h1>Member</h1>
        </div>
        <div class="col-lg-4 margin-tb p-3">
            <div class="pull-left">
                <a class="btn btn-primary float-left " href="{{ route('members.create')}}">New member</a>
            </div>
        </div>
        <div class="col-md-4 p-3 float-right">
            <form action="{{url('/')}}" method="get">
                <div class="input-group">
                    <input value="{{Request::get('search')}}" type="search" name="search" class="form-control" autocomplete="off" placeholder="Search">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">search</button>
                    </span>
                </div>
            </form>
        </div>
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
                    <td class="text-center"><img src="{{ asset($member->image) }}" style="width:70px; height:70px"></td>
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
                    <td>
                        @if ($member->role == 0)
                        {{ "user" }}
                        @else
                        {{ "admin" }}
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{route('members.show',$member->id)}}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('members.edit',$member->id)}}">Edit</a>
                    </td>
                    <td>
                        <div>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteStatus">Delete
                            </button>
                            <div class="modal fade" id="deleteStatus" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('members.destroy', $member->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <p>Are you sure you want to delete this?</p>
                                                <a href="{{ route('members.index') }}" class="btn btn-secondary">Cancel</a>
                                                <button type="submit" class="btn btn-primary float-right">Ok</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ $members->links() }}

@endsection
