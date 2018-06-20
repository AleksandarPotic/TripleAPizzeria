<?php

namespace App\Http\Controllers\Admin;

use App\Mail\OrderAccepted;
use App\Model\FinishedOrder;
use App\Model\Order;
use App\Model\Product;
use App\Model\WorkingTime;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        if (Auth::user()->can('orders')) {

            $orders = Order::orderBy('id', 'desc')->get();
            $status = WorkingTime::where('name', 'on_off')->first();
            $products = Product::all();

            return view('admin.orders.orders', compact('orders', 'status', 'products'));
        } else {
            return view('errors.404Admin');
        }
    }
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $order = Order::where('id',$id)->first();
        $order->status = 1;

        if ($order->user_id) {
            $user = User::where('id',$order->user_id)->first();

            $user_p = $user->points + $order->points;

            $user->points = $user_p;

            //$user->used_points = 0;

            $user->save();
        }

        $order->save();
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $order = Order::where('id',$id)->first();

        $order->delete();
    }

    public function info(Request $request)
    {
        $id = $request->id;
        $order = Order::where('id', $id)->first();

        $items = unserialize($order->cart);
        return view('admin.orders.info',compact('order','items'));
    }

    public function done(Request $request)
    {
        $id = $request->id;
        $order = Order::where('id',$id)->first();

        $order->minutes = $request->minutes;

        $order->save();

        $email = $order->email;

        Mail::to($email)->send(new OrderAccepted($order));

        return 'yes';
    }

    public function finish(Request $request)
    {
        $id = $request->id;
        $order = Order::where('id',$id)->first();

        $finishedOrder = new FinishedOrder();

        $finishedOrder->name = $order->name;
        $finishedOrder->email = $order->email;
        $finishedOrder->cart = $order->cart;
        $finishedOrder->number = $order->number;
        $finishedOrder->address = $order->address;
        $finishedOrder->street_number = $order->street_number;
        $finishedOrder->postal_code = $order->postal_code;
        $finishedOrder->buzzer = $order->buzzer;
        $finishedOrder->apartment_number = $order->apartment_number;
        $finishedOrder->order_type = $order->order_type;
        $finishedOrder->total_price = $order->total_price;
        $finishedOrder->minutes = $order->minutes;
        $finishedOrder->order_time_type = $order->order_time_type;
        $finishedOrder->order_time = $order->order_time;
        $finishedOrder->specify_text_order = $order->specify_text_order;
        $finishedOrder->transaction_id = $order->transaction_id;
        $finishedOrder->payment_type = $order->payment_type;

        $finishedOrder->save();
        $order->delete();

        return 'yes';
    }

    public function onOff(Request $request)
    {
        $value = $request->value;

        if ($value == '0') {

            $status = WorkingTime::where('name', 'on_off')->first();
            $status->status = '1';
            $status->save();

            return '1';

        } elseif ($value == '1') {

            $status = WorkingTime::where('name', 'on_off')->first();
            $status->status = '0';
            $status->save();

            return '0';
        }
    }

    public function clearAll(Request $request)
    {
        $orders = Order::where('status','1')->get();

        foreach ($orders as $order) {

            if ($order->order_time < date("Y F d - h:i A")) {

                $finishedOrder = new FinishedOrder();

                $finishedOrder->name = $order->name;
                $finishedOrder->email = $order->email;
                $finishedOrder->cart = $order->cart;
                $finishedOrder->number = $order->number;
                $finishedOrder->address = $order->address;
                $finishedOrder->street_number = $order->street_number;
                $finishedOrder->postal_code = $order->postal_code;
                $finishedOrder->buzzer = $order->buzzer;
                $finishedOrder->apartment_number = $order->apartment_number;
                $finishedOrder->order_type = $order->order_type;
                $finishedOrder->total_price = $order->total_price;
                $finishedOrder->minutes = $order->minutes;
                $finishedOrder->order_time_type = $order->order_time_type;
                $finishedOrder->order_time = $order->order_time;
                $finishedOrder->specify_text_order = $order->specify_text_order;
                $finishedOrder->transaction_id = $order->transaction_id;
                $finishedOrder->payment_type = $order->payment_type;

                $finishedOrder->save();
                $order->delete();

            }
        }
    }
    public function time()
    {
        return date("Y F d - h:i A");
    }
}
