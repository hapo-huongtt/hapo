@extends('layouts.adminLte')

@section('content')

<div class="row">
    <div class="container">
        <div class="col-lg-12" style="text-align: center">
            <h1>Customer</h1>
        </div>
        <div class="col-lg-12 margin-tb p-3">
            <div class="pull-left">
                <a class="btn btn-primary float-left " href="{{ route('customers.create')}}">New Customer</a>
            </div>
        </div>
        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="text-center"><strong>Id</strong></td>
                    <td class="text-center"><strong>Avatar</strong></td>
                    <td class="text-center"><strong>Customer_name</strong></td>
                    <td class="text-center"><strong>Address</strong></td>
                    <td class="text-center"><strong>Phone</strong></td>
                    <td class="text-center"><strong>Email</strong></td>
                    <td class="text-center"><strong>Project</strong></td>
                    <td colspan=3 class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td class="text-center">{{ $customer->id }}</td>
                    <td class="text-center"><img src="{{ $customer->image }}" style="width:70px; height:70px"></td>
                    <td class="text-center">{{ $customer->customer_name }}</td>
                    <td class="text-center">{{ $customer->address }}</td>
                    <td class="text-center">{{ $customer->phone }}</td>
                    <td class="text-center">{{ $customer->email }}</td>
                    <td class="text-center">
                        @foreach($customer->projects as $project)
                        <ul>
                            <li style="list-style-type:none">
                                {{$project->project_name}}
                            </li>
                        </ul>
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{route('customers.show',$customer->id)}}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('customers.edit',$customer->id)}}">Edit</a>
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
                                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <p>Are you sure you want to delete this?</p>
                                                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
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