<?php

namespace App\Http\Controllers\User;

use App\Model\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->get('coupon')) {
            $discount = number_format(session()->get('coupon')['discount'],2);
            $newTotal = number_format(Cart::subtotal() - $discount,2);
        }

        return view('user.cart', compact('newTotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;

        $product = Product::where('id',$id)->first();

        $rowId = Str::random(12);

        Cart::add($rowId, $product->name, $request->qty, $request->price, [
            'product_category' => $product->category->name,
            'size' =>$request->size,
            'cheese_size' => $request->cheese_size,
            'meat_size' => $request->meat_size,
            'peppers' => $request->peppers,
            'specify_text' => $request->text,
            'extra_piece' => $request->extra_piece,
            'donair_size' => $request->donair_size,
            'one_souce_chicken' => $request->one_souce_chicken,
            'more_souce_chicken' => $request->more_souce_chicken,
            'homemade_garlic_souce' => $request->homemade_garlic_souce,
            'choose_calzones' => $request->choose_calzones,
            'donairs_topping' => $request->donairs_topping,
            'options_for_souce' => $request->options_for_souce,
            'descriptions' => $product->descriptions
        ])
            ->associate('App\Model\Product');

    }

    public function changeQty(Request $request)
    {
        $rowId = $request->id;
        $qty = $request->qty;

        Cart::update($rowId, $qty);

        return view('user.remove');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $rowId = $request->id;

        if (!Auth::guest()) {
            $item = Cart::get($rowId);
            $points = $item->options->used_points;

            $user = Auth::user();
            $p = $user->points;
            $p_c = $user->used_points;

            $user->points = $p + $points;
            $user->used_points = $p_c - $points;

            $user->save();
        }

        Cart::remove($rowId);

        return view('user.remove');
    }

    public function destroyAll()
    {
        if (!Auth::guest()) {

            $user = Auth::user();

            $p = $user->points;
            $p_c = $user->used_points;

            $user->points = $p + $p_c;
            $user->used_points = 0;

            $user->save();
        }

        Cart::destroy();

        return view('user.remove');
    }

    public function favorites(Request $request)
    {
        Cart::store($request->identifier,$request->id,Cart::total());
    }
}
