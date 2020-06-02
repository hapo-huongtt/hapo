@extends('layouts.adminLte')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title h4">Update Task</h3>
                </div>
                <!-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
                @endif -->
                <form method="post" action="{{ route('tasks.update', $task->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Task_name</label>
                            <input type="text" class="form-control" name="task_name" value="{{$task->task_name}}" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" value="{{$task->description}}" />
                        </div>
                        <div class="form-group">
                            <label>Status_id</label>
                            <select type="text" class="form-control" name="status_id" value="{{$task->status_id}}">
                                <option>Please choose a status</option>
                                <option value="@php echo \App\Models\Member::STATUS_PENDING @endphp">Pending</option>
                                <option value="@php echo \App\Models\Member::STATUS_CLOSE @endphp">completed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Member</label>
                            <select class="form-control" name="member_id" name="member_id" value="{{$task->member_id}}">
                                @foreach($members as $member)
                                <option value="{{$member->id}}">{{$member->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Project</label>
                            <select class="form-control" name="project_id">
                                @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->project_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Began_at</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='date' class="form-control" id="datepicker" name="began_at" value="{{$task->began_at}}">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Finished_at</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='date' class="form-control" id="datepicker" name="finished_at" value="{{$task->finished_at}}">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
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
    