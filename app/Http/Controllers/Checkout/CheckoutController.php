<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Governorate;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index (Request $request){
        $emptyCart = !$request->session()->has('cart') || empty($request->session()->get('cart'));
        if ($emptyCart){
            return redirect()->back()->with('empty','Sorry There is no  Items in Carts to checkout');
        }else{
            $governorates = Governorate::all();
            return view('frontend.pages.checkout',compact('governorates'));
        }
    }

    public function addOrder(Request $request){

        $cart = session()->get('cart');
        if ($cart){

            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'payment_method' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'note' => 'required',
                'governorate_id' => 'required',
            ]);

            $client_id = auth()->user()->id ;

            $totalPrice = 0  ;
            $allQuantities = 0  ;

            foreach (session('cart') as $item ) {
                $totalPrice += $item['quantity'] * $item['price'] + 50;
            }

            foreach (session('cart') as $item => $details){
                $all_cart_products[] = "$details[name]($details[quantity])";
                $allQuantities += $details['quantity'];
            }

            $total_products = implode(",", $all_cart_products);

            if ($request->payment_method == 'cash_delivery'){
                $order = Order::create([
                    'first_name' => $request->first_name ,
                    'last_name' => $request->last_name ,
                    'address' => $request->address ,
                    'payment_method' => $request->payment_method ,
                    'email' => $request->email ,
                    'phone' => $request->phone ,
                    'note' => $request->note ,
                    'governorate_id' => $request->governorate_id,
                    'client_id' => $client_id,
                    'total_products' => $total_products,
                    'total' => $totalPrice ,
                ]);

                if ($order){
                    session()->forget('cart');
                }

                return redirect()->route('frontend.thank.you');

            }elseif ($request->payment_method == 'online_shopping'){

                Stripe::setApiKey(config('stripe.sk'));

                $two0 = "00";
                $total = "$totalPrice$two0";

                $session = \Stripe\Checkout\Session::create([
                    'line_items'  => [
                        [
                            'price_data' => [
                                'currency'     => 'AED',
                                'product_data' => [
                                    "name" => $total_products,
                                ],
                                'unit_amount'  => $total,
                            ],
                            'quantity'   => $allQuantities,
                        ],

                    ],
                    'mode'        => 'payment',
                    'success_url' => route('frontend.thank.you'),
                    'cancel_url'  => route('frontend.home'),
                ]);

                if ($session) {
                    $order = Order::create([
                        'first_name' => $request->first_name ,
                        'last_name' => $request->last_name ,
                        'address' => $request->address ,
                        'payment_method' => $request->payment_method ,
                        'email' => $request->email ,
                        'phone' => $request->phone ,
                        'note' => $request->note ,
                        'governorate_id' => $request->governorate_id,
                        'client_id' => $client_id,
                        'total_products' => $total_products,
                        'total' => $totalPrice ,
                    ]);

                    session()->forget('cart');
                    return redirect()->away($session->url);
                }
            }

        }

    }

    public function thankYou(){
        return view('frontend.pages.thank-you');
    }

}
