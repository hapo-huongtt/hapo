@extends('layouts.adminLte')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 form-group">
                            <a href="{{ route('customers.create') }}" class="btn btn-primary mb-2">Add Customer</a>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="d-flex">
                                <th class="col-1">Id</th>
                                <th class="col-1">Avatar</th>
                                <th class="col-2">Customer_name</th>
                                <th class="col-2">Gender</th>
                                <th class="col-2">Address</th>
                                <th class="col-1">Phone</th>
                                <th class="col-1">Email</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr class="d-flex">
                                <th class="col-1">{{ $customer->id }}</th>
                                <td class="col-1"><img src="{{ $customer->image }}" class="w-100"></td>
                                <td class="col-2">{{ $customer->customer_name }}</td>
                                <td class="col-2">{{ $customer->gender }}</td>
                                <td class="col-1">{{ $customer->address }}</td>
                                <td class="col-1">{{ $customer->phone }}</td>
                                <td class="col-2">{{ $customer->email }}</td>
                                <td class="col-2">
                                <td>
                                    <a class="btn btn-info" href="{{route('members.show',$member->id)}}">Show</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('members.edit',$member->id)}}">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('members.destroy',$member->id)}}" method="post">
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
        </div>
</section>
@endsection