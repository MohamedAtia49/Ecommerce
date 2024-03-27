@extends('frontend.layout')
@section('title', 'My Orders')

@section('content')
    <table class="table table-striped table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Payment Method</th>
                <th>State</th>
                <th>Products</th>
                <th>Total Price</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->first_name }}</td>
                    <td>{{ $order->last_name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->payment_method }}</td>
                    @if ($order->state == 'pending')
                        <td class="badge text-sm bg-warning text-dark">{{ $order->state }}</td>
                    @elseif ($order->state == 'accepted')
                    <td class="badge text-sm bg-success text-dark">{{ $order->state }}</td>
                    @elseif ($order->state == 'rejected')
                    <td class="badge text-sm bg-danger text-dark">{{ $order->state }}</td>
                    @elseif ($order->state == 'delivered')
                    <td class="badge text-sm bg-primary text-dark">{{ $order->state }}</td>
                    @endif
                    <td>{{ $order->total_products }}</td>
                    <td>$ {{ $order->total }}</td>
                    <td>
                        @if($order->state == 'pending' || $order->state == 'rejected')
                        <form action="{{ route('frontend.order.delete', $order->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button href="" class="btn btn-sm bg-danger btn-outline-primary">Delete</button>
                        </form>
                        @elseif ($order->state == 'accepted' || $order->state == 'delivered')
                            Not deleteable
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
