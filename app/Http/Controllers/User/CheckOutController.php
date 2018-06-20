<?php

namespace App\Http\Controllers\User;

use App\Model\WorkingTime;
use App\User\PostalCode;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckOutController extends Controller
{
    public function preCheckout()
    {
        $status = WorkingTime::where('id',1)->first();

        if ($status->status) {
            if (Cart::count() > 0) {
                return view('user.pre-checkout');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    public function preCheckoutEdit(Request $request)
    {
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

        return view('user.pre-checkout-edit',compact('fName','lName','email','pNumber','street','city','buzzer','apartment_number','postal_code','order_type','order_time_type','order_time','specify_text_order'));
    }

    public function CheckoutDone(Request $request)
    {
        //return $request->all();
        $status = WorkingTime::where('id',1)->first();

        if ($status->status) {

            if (Cart::count() > 0) {
                $request->all();

                $fName = $request->fName;
                $lName = $request->lName;
                $email = $request->email;
                $pNumber = $request->pNumber;
                $payment = $request->payment;
                $messageError = '';

                $order_time_type = $request->order_time_type;
                if ($request->order_time) {
                    $order_time = $request->order_time;
                } else {
                    $order_time = null;
                }
                $specify_text_order = $request->specify_text_order;

                if ($request->street and $request->city and $request->postal_code) {
                    $street = $request->street;
                    $city = $request->city;
                    $buzzer = $request->buzzer;
                    $apartment_number = $request->apartment_number;
                    $postal_code = $request->postal_code;
                    $postal_code1 = substr($postal_code,0,3);
                    $pos_codes = PostalCode::where('postal_code',$postal_code1)->first();

                    if (!$pos_codes) {
                        return redirect()->back()->with('message_signup','We apologize for the inconvenience, but we do not deliver to your area, please choose Pick-Up.');

                    } else {

                        $order_type = 'Delivery';
                        $delivery_free = $pos_codes->delivery_free;

                        return view('user.checkout-done', compact('fName', 'lName', 'email', 'pNumber', 'street', 'city','buzzer', 'payment','apartment_number', 'postal_code', 'order_type','delivery_free','order_time','order_time_type','specify_text_order','messageError'));

                    }

                } else {
                    $street = null;
                    $city = null;
                    $postal_code = null;
                    $buzzer = null;
                    $apartment_number = null;
                    $order_type = 'Pick up';
                    $delivery_free = 0;

                    return view('user.checkout-done', compact('fName', 'lName', 'email', 'pNumber', 'street', 'city','buzzer', 'payment','apartment_number', 'postal_code', 'order_type','delivery_free','order_time','order_time_type','specify_text_order','messageError'));
                }
            }else {
                return redirect()->route('cart.index');
            }
        } else {
            return redirect()->route('cart.index');
        }
    }
}
