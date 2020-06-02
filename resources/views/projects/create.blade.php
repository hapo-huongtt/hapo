@extends('layouts.adminLte')

@section('content')

<div class="row">
    <div class="container ">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title h4">New project</h3>
                </div>
                <form role="form" id="quickForm" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>project_name</label>
                            <input type="text" class="form-control" name="project_name" autocomplete="off" placeholder="Enter project_name" value="{{ old('project_name') }}">
                            @error('project_name')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" autocomplete="off" placeholder="Enter description" value="{{ old('description') }}">
                            @error('description')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Member</label>
                            <select class="select2-multiple"  multiple="multiple" style="width: 100%" name="member_id[]">
                                @foreach($members as $member)
                                <option value="{{$member->id}}">{{$member->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Customer</label>
                            <select class="form-control" name="customer_id">
                                @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select type="text" class="form-control" name="status_id">
                                <option>Please choose a status</option>
                                <option value="@php echo App\Models\Member::STATUS_PENDING @endphp">Pending</option>
                                <option value="@php echo App\Models\Member::STATUS_CLOSE @endphp">completed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Began_at</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='date' class="form-control" id="datepicker" name="began_at">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Finished_at</label>
                            <div class='input-group date' id='datetimepicker2'>
                                <input type='date' class="form-control" name="finished_at">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('projects.index') }}" class="btn btn-danger float-right">Cancel</a>
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
    