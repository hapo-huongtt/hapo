@extends('layouts.adminLte')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Task</h3>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                </br>
                @endif
                <form role="form" id="quickForm" action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Task_name</label>
                            <input type="text" class="form-control" name="task_name" autocomplete="off" placeholder="Enter task_name" value="{{ old('task_name') }}">
                            @error('task_name')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="description" class="form-control" name="description" autocomplete="off" placeholder="Enter description" value="{{ old('description') }}">
                            @error('description')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status_id</label>
                            <input type="text" class="form-control" name="status_id" autocomplete="off" placeholder="Enter status_id" value="{{ old('status_id') }}">
                            @error('status_id')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Member_id</label>
                            <input type="text" class="form-control" name="member_id" autocomplete="off" placeholder="Enter member_id" value="{{ old('member_id') }}">
                            @error('member_id')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Began_at</label>
                            <input type="text" class="form-control" name="began_at" autocomplete="off" placeholder="Enter began_at" value="{{ old('began_at') }}">
                            @error('began_at')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Finish_at</label>
                            <input type="text" class="form-control" name="finish_at" autocomplete="off" placeholder="Enter finish_at" value="{{ old('finish_at') }}">
                            @error('password')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('tasks.index') }}" class="btn btn-danger float-right">Cancel</a>
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

        @endsection