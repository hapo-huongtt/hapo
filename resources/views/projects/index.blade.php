@extends('layouts.adminLte')

@section('content')

<div class="row">
    <div class="container ">
        <div class="col-lg-12" style="text-align: center">
            <h1>Project</h1>
        </div>
        <div class="col-lg-12 margin-tb p-3">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.create')}}">New project</a>
            </div>
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
                    <td class="text-center"><strong>Member_id</strong></td>
                    <td class="text-center"><strong>Customer_id</strong></td>
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
                        {{ "incomplete" }}
                        @else
                        {{ "complete" }}
                        @endif
                    </td>
                    <td class="text-center">{{$project->member_id}}</td>
                    <td class="text-center">{{$project->customer_id}}</td>
                    <td class="text-center">{{$project->began_at}}</td>
                    <td class="text-center">{{$project->finished_at}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('projects.show',$project->id)}}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('projects.edit',$project->id)}}">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('projects.destroy',$project->id)}}" method="post">
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
