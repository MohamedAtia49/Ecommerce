<?php

namespace App\Http\Controllers\Frontend\Orders;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getMyOrders ()
    {
        $client_id = auth()->guard('client')->user()->id;
        $orders = Order::where('client_id',$client_id)->get();
        return view('frontend.pages.my-orders',compact('orders'));
    }

    public function deleteOrder($id){
        $order = Order::find($id);
        if($order->state == 'pending' || $order->state == 'rejected'){
            $order->delete();
            return redirect()->route('frontend.my.orders');
        }else{
            return redirect()->back();
        }
    }
}
