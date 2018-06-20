<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Model\Order;

use CraigPaul\Moneris\Moneris;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {

        //Customer Information
        $fName = $request->fName;
        $lName = $request->lName;
        $email = $request->email;
        $pNumber = $request->phone;
        $street = $request->address;
        $order_time_type = $request->order_time_type;
        $order_time = $request->order_time;
        $city = $request->street_number;
        $buzzer = $request->buzzer;
        $apartment_number = $request->apartment_number;
        $postal_code = $request->postal_code;
        $order_type = $request->order_type;
        $specify_text_order = $request->specify_text_order;
        $payment = $request->payment;
        $delivery_free = $request->delivery_free;

        //Store Information
        $id = 'store1';
        $token = 'yesguy';

        // optional
        $params = [
            'environment' => Moneris::ENV_TESTING, // default: Moneris::ENV_LIVE
            'avs' => false, // default: false
            'cvd' => true, // default: false
        ];

        $gateway = (new Moneris($id, $token, $params))->connect();

        $transaction_id = uniqid('1234-5678', true);

        $params = [
            'order_id' => $transaction_id,
            'amount' => $request->total_price,
            'credit_card' => $request->card_number,
            'expiry_month' => $request->month,
            'expiry_year' => $request->year,
            'cvd' => $request->cvd,
        ];
        $response = $gateway->purchase($params);

        if ($response->successful) {
            $receipt = $response->receipt();

            //Create Order
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
            $order->transaction_id = $transaction_id;
            $order->payment_type = 'Credit/Debit Card';
            $order->status = 0;

            $order->cart = serialize($cart);

            $order->save();

            Cart::instance('default')->destroy();

            return view('user.thank-you');

        } else {
            $errors = $response->errors;
            return view('user.checkout-done',compact('fName','lName','email','pNumber','street','city','buzzer','apartment_number','postal_code','order_type','order_time_type','order_time','specify_text_order','payment','delivery_free'))->with('messageError','The transaction failed. Try again!');

        }
    }
}
