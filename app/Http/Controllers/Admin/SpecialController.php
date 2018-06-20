<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Special;
use App\Model\Category;
use App\Model\Customize;
use App\Model\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class SpecialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except('specials','popUp','addToCart','YourOrder');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specials = Special::all();
        return view('admin.specials.specials',compact('specials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.specials.new',compact('products','categories'));
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
            'name' => 'required|unique:specials',
            'descriptions' => 'required',
            'price' => 'required'
        ]);

        $special = new Special();

        $special->name = $request->name;
        $special->descriptions = $request->descriptions;
        $special->price = $request->price;
        $special->product1 = $request->product1;
        $special->pizza1size = $request->pizza1size;
        $special->pizza1toppings = $request->pizza1toppings;
        $special->product2 = $request->product2;
        $special->pizza2size = $request->pizza2size;
        $special->pizza2toppings = $request->pizza2toppings;
        $special->product3 = $request->product3;
        $special->product3category = $request->product3category;
        $special->product3size = $request->product3size;
        $special->product4 = $request->product4;
        $special->product4category = $request->product4category;
        $special->product4size = $request->product4size;
        $special->product5 = $request->product5;
        $special->product5size = $request->product5size;
        $special->product6 = $request->product6;
        $special->product6size = $request->product6size;

        $special->save();

        return redirect()->back()->with('message','Successfully added special!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $special = Special::where('id',$id)->first();
        $products = Product::all();
        $categories = Category::all();

        return view('admin.specials.update',compact('special','products','categories'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'descriptions' => 'required',
            'price' => 'required'
        ]);

        $special = Special::where('id',$id)->first();


        $special->name = $request->name;
        $special->descriptions = $request->descriptions;
        $special->price = $request->price;
        $special->product1 = $request->product1;
        $special->pizza1size = $request->pizza1size;
        $special->pizza1toppings = $request->pizza1toppings;
        $special->product2 = $request->product2;
        $special->pizza2size = $request->pizza2size;
        $special->pizza2toppings = $request->pizza2toppings;
        $special->product3 = $request->product3;
        $special->product3category = $request->product3category;
        $special->product3size = $request->product3size;
        $special->product4 = $request->product4;
        $special->product4category = $request->product4category;
        $special->product4size = $request->product4size;
        $special->product5 = $request->product5;
        $special->product5size = $request->product5size;
        $special->product6 = $request->product6;
        $special->product6size = $request->product6size;

        $special->save();

        return redirect()->route('specials.index')->with('message','Special successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $special = Special::where('id',$id)->first();

        $special->delete();

        return redirect()->back()->with('message', 'Special was successfully deleted!');
    }

    public function specials()
    {
        $specials = Special::all();
        return view('user.specials',compact('specials'));
    }
    public function popUp(Request $request)
    {
        $id = $request->id;
        $special = Special::where('id',$id)->first();
        $products = Product::all();
        $customizes = Customize::all();

        return view('user.specialPopUp',compact('special','products','customizes'));
    }
    public function addToCart(Request $request)
    {
        return $request->all();
    }
    public function YourOrder(Request $request)
    {
        $rowId = Str::random(12);
        Cart::add($rowId, $request->name_special, 1, $request->price_special,[
            'product_category' => 'Special',
            'description_special' => $request->description_special,
            'pizza1special' => $request->pizza1,
            'toppingpizza1special' => $request->toppingpizza1,
            'pizza2special' => $request->pizza2,
            'toppingpizza2special' => $request->toppingpizza2,
            'product3special' => $request->product3,
            'product4special' => $request->product4,
            'product5special' => $request->product5,
            'product6special' => $request->product6,
            'special_instruction_special' => $request->special_instruction_special,
            'one_souce_chicken_special' => $request->one_souce_chicken_special,
            'more_souce_chicken_special' => $request->more_souce_chicken_special
        ]);
    }
}
