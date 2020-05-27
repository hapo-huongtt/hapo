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
                    <td class="text-center"><strong>Member_id</strong></td>
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
                    <td class="text-center">{{ $task->member_name }}</td>
                    <td class="text-center">{{$task->began_at}}</td>
                    <td class="text-center">{{$task->finished_at}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('tasks.show',$task->id)}}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('tasks.edit',$task->id)}}">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('tasks.destroy',$task->id)}}" method="post">
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
