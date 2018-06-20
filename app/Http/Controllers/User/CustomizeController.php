<?php

namespace App\Http\Controllers\User;

use App\Model\Customize;
use App\Model\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class CustomizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('errors.404');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
    public function show(Request $request)
    {return $request->all();
        $id = $request->id;

        $product = Product::where('id',$id)->first();
        if ($product->category->name == 'Pizza') {
            $customizes = Customize::all();
            return view('user.customize',compact('product','customizes'));
        } else {
            return redirect()->back();
        }
    }
    */
    public function setUp(Request $request)
    {
        $id = $request->id;
        $size = $request->size;
        $qty = $request->qty;
        $price = $request->price;

        $product = Product::where('id',$id)->first();
        if ($product->category->name == 'Pizza') {
            $customizes = Customize::all();
            $regular_toppings = Customize::where('regular_premium','regular')->first();
            $premium_toppings = Customize::where('regular_premium','premium')->first();
            return view('user.customize',compact('product','customizes','regular_toppings','premium_toppings','price','qty','size'));
        } else {
            return redirect()->back();
        }
    }

    public function rewardsOne(Request $request)
    {
        //return $request->all();
        $id = $request->pizza_id;
        $pizza_name = $request->pizza_name;

        $product = Product::where('id',$id)->first();
        if ($product->category->name == 'Pizza') {
            $customizes = Customize::all();
            $regular_toppings = Customize::where('regular_premium','regular')->first();
            $premium_toppings = Customize::where('regular_premium','premium')->first();
            return view('user.customize-one',compact('product','pizza_name','customizes','regular_toppings','premium_toppings'));
        } else {
            return redirect()->back();
        }

    }
    public function rewardsTwo(Request $request)
    {

        $id = $request->pizza_id;
        $pizza_name = $request->pizza_name;

        $product = Product::where('id',$id)->first();
        if ($product->category->name == 'Pizza') {
            $customizes = Customize::all();
            $regular_toppings = Customize::where('regular_premium','regular')->first();
            $premium_toppings = Customize::where('regular_premium','premium')->first();
            return view('user.customize-two',compact('product','pizza_name','customizes','regular_toppings','premium_toppings'));
        } else {
            return redirect()->back();
        }
    }
    public function rewardsThree(Request $request)
    {

        $id = $request->pizza_id;
        $pizza_name = $request->pizza_name;

        $product = Product::where('id',$id)->first();
        if ($product->category->name == 'Pizza') {
            $customizes = Customize::all();
            $regular_toppings = Customize::where('regular_premium','regular')->first();
            $premium_toppings = Customize::where('regular_premium','premium')->first();
            return view('user.customize-three',compact('product','pizza_name','customizes','regular_toppings','premium_toppings'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|between:1,10'
        ]);

        $product = Product::where('id',$request->product_id)->first();
        $category = $product->category->name;
        $name = $product->name;

        $size = $request->size_radio;

        $cheeses = $request->cheeses_name;
        $meats = $request->meats_name;
        $veggies = $request->veggies_name;

        $noToppings = $request->noTopping;
        $noToppingsId = $request->noToppingId;

        $bonus = $request->bonus;
        $qty = $request->quantity;

        if ($request->used_points) {
            $used_points = $request->used_points;

            $user = Auth::user();

            $points = $user->points;

            if ($used_points > $points) {
                return redirect()->route('index');
            }

            $points_u = $user->used_points;

            $user->points = $points - $used_points;
            $user->used_points = $used_points + $points_u;

            $user->save();

            $qty = 1;
            $name = $request->pizza_name;
        } else {
            $used_points = 0;
        }

        $product_price = $request->total_price;

        $rowId = Str::random(8);

        Cart::add($rowId, $name, $qty, $product_price, [
            'product_category' => $category,
            'bonus' => $bonus,
            'used_points' => $used_points,
            'product_id' => $request->product_id,
            'descriptions' => $request->descriptions,
            'size' => $size,
            'meats_name' => $meats,
            'veggies_name' => $veggies,
            'cheeses_name' => $cheeses,
            'no_toppings' => $noToppings,
            'specify_text' => $request->special_need,
            'no_toppings_id' => $noToppingsId,
            'crust' => $request->crust,
            'crust_type' => $request->crust_type
            ]);

        return redirect()->route('user.categoryMenu');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Cart::get($id);

        $product_id = $item->options->product_id;
        $product = Product::where('id',$product_id)->first();
        $customizes = Customize::all();

        $regular_toppings = Customize::where('regular_premium','regular')->first();
        $premium_toppings = Customize::where('regular_premium','premium')->first();

        return view('user.customize-edit',compact('item','customizes','regular_toppings','premium_toppings','product'));
    }
    public function rewardsOneEdit($id)
    {
        $item = Cart::get($id);

        $product_id = $item->options->product_id;
        $product = Product::where('id',$product_id)->first();
        $customizes = Customize::all();

        $regular_toppings = Customize::where('regular_premium','regular')->first();
        $premium_toppings = Customize::where('regular_premium','premium')->first();

        return view('user.customize-one-edit',compact('item','customizes','regular_toppings','premium_toppings','product'));
    }
    public function rewardsTwoEdit($id)
    {
        $item = Cart::get($id);

        $product_id = $item->options->product_id;
        $product = Product::where('id',$product_id)->first();
        $customizes = Customize::all();

        $regular_toppings = Customize::where('regular_premium','regular')->first();
        $premium_toppings = Customize::where('regular_premium','premium')->first();

        return view('user.customize-two-edit',compact('item','customizes','regular_toppings','premium_toppings','product'));
    }
    public function rewardsThreeEdit($id)
    {
        $item = Cart::get($id);

        $product_id = $item->options->product_id;
        $product = Product::where('id',$product_id)->first();
        $customizes = Customize::all();

        $regular_toppings = Customize::where('regular_premium','regular')->first();
        $premium_toppings = Customize::where('regular_premium','premium')->first();

        return view('user.customize-three-edit',compact('item','customizes','regular_toppings','premium_toppings','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRow(Request $request)
    {

        $validatedData = $request->validate([
            'quantity' => 'required|integer|between:1,10'
        ]);

        //return $request->all();

        $product = Product::where('id',$request->product_id)->first();
        $category = $product->category->name;

        $size = $request->size_radio;

        $cheeses = $request->cheeses_name;
        $meats = $request->meats_name;
        $veggies = $request->veggies_name;

        $bonus = $request->bonus;
        $qty = $request->quantity;

        $noToppings = $request->noTopping;
        $noToppingsId = $request->noToppingId;

        if ($request->used_points) {
            $qty = 1;
            $used_points = $request->used_points;
        } else {
            $used_points = 0;
        }

        $product_price = $request->total_price;

        $rowId = $request->row_id;

        Cart::update($rowId,['price' => $product_price,'qty' => $qty ,'options'=>[
                'product_category' => $category,
                'bonus' => $bonus,
                'used_points' => $used_points,
                'product_id' => $request->product_id,
                'descriptions' => $request->descriptions,
                'size' => $size,
                'meats_name' => $meats,
                'veggies_name' => $veggies,
                'cheeses_name' => $cheeses,
                'no_toppings' => $noToppings,
                'specify_text' => $request->special_need,
                'no_toppings_id' => $noToppingsId,
                'crust' => $request->crust,
                'crust_type' => $request->crust_type
            ]
        ]);

        return redirect()->route('user.categoryMenu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
