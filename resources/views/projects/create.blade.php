@extends('layouts.adminLte')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Project</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Project_name</label>
                            <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Enter name" value="{{ old('name') }}">
                            @error('name')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" autocomplete="off" placeholder="Enter description" value="{{ old('description') }}">
                                </textarea>
                            @error('description')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Began_at</label>
                            <input type="date" class="form-control" name="began_at" autocomplete="off">
                            @error('began_at')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Finish_at</label>
                            <input type="date" class="form-control" name="finished_at" autocomplete="off" value="{{ old('finished_at') }}">
                            @error('finished_at')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status_id">
                                @foreach($statuses as $status)
                                <option value="{{ $status->id }}" {{ ($status->id == old('status_id')) ? 'selected': '' }}>{{ $status->name }}</option>
                                @endforeach
                            </select>
                            @error('status_id')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Customer</label>
                            <select class="form-control" name="customer_id">
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ ($customer->id == old('customer_id')) ? 'selected': '' }}>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customer_id')
                            <strong class="alert text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection