@extends('layouts.adminLte')

@section('content')

<section class="content">
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
        </div><br />
        @endif
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="d-flex">
                    <th class="col-1">Id</th>
                    <th class="col-1">Avatar</th>
                    <th class="col-2">Customer_name</th>
                    <th class="col-2">Address</th>
                    <th class="col-1">Phone</th>
                    <th class="col-1">Email</th>
                    <th class="col-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                <tr class="d-flex">
                    <th class="col-1">{{ $customer->id }}</th>
                    <td class="col-1"><img src="{{ $customer->image }}" class="w-100"></td>
                    <td class="col-2">{{ $customer->customer_name }}</td>
                    <td class="col-2">{{ $customer->address }}</td>
                    <td class="col-1">{{ $customer->phone }}</td>
                    <td class="col-2">{{ $customer->email }}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('customers.show',$customer->id)}}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('customers.edit',$customer->id)}}">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('customers.destroy',$customer->id)}}" method="post">
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
</section>

@endsection