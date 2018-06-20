<?php

namespace App\Http\Controllers\User;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        //return $request->all();
        if (Cart::count() > 0) {

            $cart = Cart::content();
            $totalPrice = $request->total_price;

            if (!Auth::guest()) {
                $user = Auth::user();

                $currentPoints = $totalPrice / 8;
                $all_points = intval($currentPoints);
                $user_id = $user->id;

                $user_points = $user->points;
                $user->points = $user_points + $all_points;

                $user->used_points = 0;

                $user->save();
            } else {
                $all_points = null;
                $user_id = null;
            }

            $order = new Order();

            $order->name = $request->name;
            $order->email = $request->email;
            $order->number = $request->phone;
            $order->address = $request->address;
            $order->street_number = $request->street_number;
            $order->buzzer = $request->buzzer;
            $order->apartment_number = $request->apartment_number;
            $order->postal_code = $request->postal_code;
            $order->order_type = $request->order_type;
            $order->order_time_type = $request->order_time_type;
            $order->order_time = $request->order_time;
            $order->specify_text_order = $request->specify_text_order;
            $order->total_price = $totalPrice;
            $order->points = $all_points;
            $order->user_id = $user_id;
            $order->payment_type = 'Cash';
            $order->status = 0;

            $order->cart = serialize($cart);

            $order->save();

            Cart::instance('default')->destroy();

            return view('user.thank-you');

        } else {
            return redirect()->route('index');
        }
    }

    public function storePaypal()
    {

        Cart::instance('default')->destroy();

        return view('user.thank-you');
    }
}
