@extends('layouts.adminLte')

@section('content')

<div class="row">
    <div class="container ">
        <div class="col-lg-12" style="text-align: center">
            <h1>Project</h1>
        </div>
        <div class="col-md-4  p-3">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.create')}}">New Project</a>
            </div>
        </div>
        <div class="col-md-4 p-3 float-right">
            <form action="{{url('/search')}}" method="Get">
                <div class="input-group">
                    <input value="{{Request::get('key')}}" type="search" name="key" class="form-control"  autocomplete="off" placeholder="Search">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">search</button>
                    </span>
                </div>
            </form>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p id="msg">{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="text-center"><strong>ID</strong></td>
                    <td class="text-center"><strong>Project_name</strong></td>
                    <td class="text-center"><strong>Description</strong></td>
                    <td class="text-center"><strong>Status_id</strong></td>
                    <td class="text-center"><strong>Member</strong></td>
                    <td class="text-center"><strong>Customer</strong></td>
                    <td class="text-center"><strong>Began_at</strong></td>
                    <td class="text-center"><strong>Finished_at</strong></td>
                    <td colspan=3 class="text-center"><strong>Action</strong></td>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td class="text-center">{{$project->id}}</td>
                    <td class="text-center">{{$project->project_name}}</td>
                    <td class="text-center">{{$project->description}}</td>
                    <td>
                        @if ($project->status_id == 1)
                        {{ "complete" }}
                        @else
                        {{ "pending" }}
                        @endif
                    </td>
                    <td class="text-center">
                        @foreach($project->members as $member)
                        <ul>
                            <li style="list-style-type:none">
                                {{$member->name}}
                            </li>
                        </ul>
                        @endforeach
                    </td>
                    <td class="text-center">{{$project->customer_name}}</td>
                    <td class="text-center">{{$project->began_at}}</td>
                    <td class="text-center">{{$project->finished_at}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('projects.show',$project->id)}}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('projects.edit',$project->id)}}">Edit</a>
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
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <p>Are you sure you want to delete this?</p>
                                                <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
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
{{$projects->links()}}

@endsection
