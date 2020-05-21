@extends('layouts.adminLte')
@section('content')


<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <h2>Update a task</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{ route('projects.update', $project->id)}}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">project_name</label>
                    <input type="text" class="form-control" name="project_name" value="{{$project->project_name}}" />
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="description" autocomplete="off" placeholder="Enter description" value="{{ old('description', $project->description) }}">
                    @error('description')
                    <strong class="alert text-danger">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Member_id</label>
                    <select class="form-control" name="member_id">
                        @foreach($members as $member)
                        <option value="{{$member->id}}">{{$member->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Customer_id</label>
                    <select class="form-control" name="customer_id">
                        @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Status_id</label>
                    <select type="text" class="form-control" name="status_id">
                        <option>No</option>
                        <option value="1">incomplete</option>
                        <option value="2">complete</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Began_at</label>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='date' class="form-control" id="datepicker" name="began_at" value="{{$project->began_at}}">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Finished_at</label>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='date' class="form-control" id="datepicker" name="finished_at" value="{{$project->finished_at}}">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            <div class="col-sm-12">
                @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success')}}
                </div>
                @endif
            </div>
            <script type="text/javascript">
                $(function() {
                    $('#datetimepicker').datetimepicker();
                });
            </script>
        </div>
    </div>
</div>

@endsection