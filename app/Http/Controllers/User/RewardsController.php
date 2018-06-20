<?php

namespace App\Http\Controllers\User;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\WorkingTime;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class RewardsController extends Controller
{
    public function index()
    {
        $products = Product::where('category_id',2)->get();
        $desserts = Product::where('category_id',16)->get();
        $working_time = WorkingTime::where('name','on_off')->first();

        return view('user.rewards',compact('products','working_time','desserts'));
    }
    public function dessert(Request $request)
    {
        if ($request->points >= 10) {
            $dessert = Product::where('id',$request->dessert_id)->first();

            $rowId = Str::random(8);

            $product_price = 0;

            //$used_points = $request->points;

            $user = Auth::user();

            $points = $user->points;
            $points_u = $user->used_points;

            $user->points = $points - 10;
            $user->used_points = $points_u + 10;

            $user->save();

            Cart::add($rowId, $dessert->name, 1, $product_price, [
                'used_points' => 10,
            ]);

            return redirect()->route('cart.index');

        } else {
            return redirect()->back();
        }
    }
}
