@extends('admin_layouts.app')
{{-- @inject('city' ,'App\Models\City') --}}

@section('page_title')
    Dashboard :
@endsection
@section('small_title')
    Delivered Orders
@endsection
@section('content')

<table class="table table-striped table-bordered table-hover text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Payment Method</th>
            <th>Products</th>
            <th>Total Price</th>
            <th>State</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->first_name }}</td>
                <td>{{ $order->last_name }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->total_products }}</td>
                <td>$ {{ $order->total }}</td>
                <td class="badge text-sm bg-primary text-dark">{{ $order->state }}</td>
        @endforeach
    </tbody>
</table>

@endsection
