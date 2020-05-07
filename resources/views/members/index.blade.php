@extends('layouts.adminLte')
@section('content')

<div class="'row">
    <div class="container">
        <div class="col-lg-12" style="text-align: center">
            <h1>member</h1>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('members.create')}}">New member</a>
            </div>
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
                    <td class="text-center"><strong>Name</strong></td>
                    <td class="text-center"><strong>Email</strong></td>
                    <td class="text-center"><strong>Age</strong></td>
                    <td class="text-center"><strong>Gender</strong></td>
                    <td class="text-center"><strong>Phone</strong></td>
                    <td class="text-center"><strong>Address</strong></td>
                    <td class="text-center"><strong>Password</strong></td>
                    <td colspan=3 class="text-center"><strong>Action</strong></td>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td class="text-center">{{$member->id}}</td>
                    <td class="text-center">{{$member->name}}</td>
                    <td class="text-center">{{$member->email}}</td>
                    <td class="text-center">{{$member->age}}</td>
                    <td class="text-center">{{$member->gender}}</td>
                    <td class="text-center">{{$member->phone}}</td>
                    <td class="text-center">{{$member->address}}</td>
                    <td class="text-center">{{$member->password}}</td>
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
