@extends('layouts.adminLte')

@section('content')

<div class="row">
    <div class="container ">
        <div class="col-lg-12" style="text-align: center">
            <h1>Task</h1>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tasks.create')}}">New task</a>
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
                    <td class="text-center"><strong>task_name</strong></td>
                    <td class="text-center"><strong>Description</strong></td>
                    <td class="text-center"><strong>Status_id</strong></td>
                    <td class="text-center"><strong>Member</strong></td>
                    <td class="text-center"><strong>Project</strong></td>
                    <td class="text-center"><strong>Began_at</strong></td>
                    <td class="text-center"><strong>Finished_at</strong></td>
                    <td colspan=3 class="text-center"><strong>Action</strong></td>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td class="text-center">{{$task->id}}</td>
                    <td class="text-center">{{$task->task_name}}</td>
                    <td class="text-center">{{$task->description}}</td>
                    <td>
                        @if ($task->status_id == 1)
                        {{ "complete" }}
                        @else
                        {{ "pending" }}
                        @endif
                    </td>
                    <td class="text-center">{{$task->member_name}}</td>
                    <td class="text-center">{{$task->project_name}}</td>
                    <td class="text-center">{{$task->began_at}}</td>
                    <td class="text-center">{{$task->finished_at}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('tasks.show',$task->id)}}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('tasks.edit',$task->id)}}">Edit</a>
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
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <p>Are you sure you want to delete this?</p>
                                                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
                                                <button type="submit" class="btn btn-primary">Save</button>
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

@endsection