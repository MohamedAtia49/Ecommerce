@extends('admin_layouts.app')
{{-- @inject('city' ,'App\Models\City') --}}

@section('page_title')
    Dashboard :
@endsection
@section('small_title')
    Pending Orders
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
            <th>State</th>
            <th>Products</th>
            <th>Total Price</th>
            <th>Accept Order</th>
            <th>Reject Order</th>
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
                <td class="badge text-sm bg-warning text-dark">{{ $order->state }}</td>
                <td>{{ $order->total_products }}</td>
                <td>$ {{ $order->total }}</td>
                <td>
                    <form action="{{ route('admin.order.accept',$order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Accept</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('admin.order.reject', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                </td>
        @endforeach
    </tbody>
</table>

@endsection
