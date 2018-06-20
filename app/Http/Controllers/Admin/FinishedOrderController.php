<?php

namespace App\Http\Controllers\Admin;

use App\Model\FinishedOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FinishedOrderController extends Controller
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

            $finishedOrders = FinishedOrder::orderBy('created_at', 'desc')->get();
            return view('admin.finishedOrders.finishedOrders', compact('finishedOrders'));
        } else {
            return view('errors.404Admin');
        }
    }

    public function info(Request $request)
    {
        $id = $request->id;
        $order = FinishedOrder::where('id', $id)->first();

        $items = unserialize($order->cart);
        return view('admin.orders.info',compact('order','items'));
    }

    public function destroy()
    {
        $finishedOrders = FinishedOrder::all();

        foreach ($finishedOrders as $finishedOrder) {

            $finishedOrder->delete();

        }

        return redirect()->back()->with('message','Order History was successfully deleted.');
    }
}
