<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pendingOrders()
    {
        $orders = Order::where('state','pending')->get();
        return view('admin.orders.pending',compact('orders'));
    }
    public function acceptedOrders()
    {
        $orders = Order::where('state','accepted')->get();
        return view('admin.orders.accepted',compact('orders'));
    }
    public function deliveredOrders()
    {
        $orders = Order::where('state','delivered')->get();
        return view('admin.orders.delivered',compact('orders'));
    }


    public function setAccept($id)
    {
        $order = Order::find($id);
        $order->update([
            'state' => 'accepted',
        ]);
        return redirect()->back();
    }
    public function setReject($id)
    {
        $order = Order::find($id);
        $order->update([
            'state' => 'rejected',
        ]);
        return redirect()->back();
    }
    public function setDelivered($id)
    {
        $order = Order::find($id);
        $order->update([
            'state' => 'delivered',
        ]);
        return redirect()->back();
    }
}
