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

@endsection
