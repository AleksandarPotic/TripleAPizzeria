<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Mail\SendMail;
use App\Model\FinishedOrder;
use App\Model\Order;
use App\Model\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
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
        $orders = Order::all();
        $users = User::all();
        $products = Product::orderBy('created_at','desc')->take(4)->get();
        $productsAll = Product::all();
        $finishedOrders = FinishedOrder::all();
        $admins = Admin::orderBy('created_at','desc')->take(8)->get();
        return view('admin.home',compact('orders','users','products','finishedOrders','admins','productsAll'));
    }

    public function mail()
    {
        $users = User::where('email_status','Yes')->get();

        foreach ($users as $user) {

            $email = $user->email;

            Mail::to($email)->send(new SendMail());
        }

        return "yes";
    }
}
