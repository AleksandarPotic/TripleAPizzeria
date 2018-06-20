<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\Customize;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('products.view')) {
            if (request()->category) {
                $cat = Category::where('slug', request()->category)->get();

                if ($cat->count() != 0) {
                    $products = Product::with('category')->whereHas('category', function ($query) {
                        $query->where('slug', request()->category);
                    })->get();
                    $categories = Category::all();

                    $categoryName = Category::where('slug', request()->category)->first()->name;
                    $categorySlug = Category::where('slug', request()->category)->first()->slug;
                } else {
                    return view('errors.404Admin');
                }
            }

            return view('admin.products.products', compact('products', 'categories', 'categoryName', 'categorySlug'));
        } else {
            return view('errors.404Admin');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('products.view')) {
            if (request()->category) {

                $categoryName = Category::where('slug', request()->category)->first()->name;
                $categoryId = Category::where('slug', request()->category)->first()->id;
                $categorySlug = Category::where('slug', request()->category)->first()->slug;
            }
            $customizes = Customize::all();
            return view('admin.products.new', compact('categoryName', 'categoryId', 'customizes', 'categorySlug'));
        } else {
            return view('errors.404Admin');
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
        if (Auth::user()->can('products.view')) {

            $product = new Product();

            $product->name = $request->name;


            if ($request->small) {
                $product->small = $request->small;
            } else {
                $product->small = null;
            }
            if ($request->medium) {
                $product->medium = $request->medium;
            } else {
                $product->medium = null;
            }
            if ($request->large) {
                $product->large = $request->large;
            } else {
                $product->large = null;
            }
            if ($request->xlg) {
                $product->xlg = $request->xlg;
            } else {
                $product->xlg = null;
            }
            if ($request->price) {
                $product->price = $request->price;
            } else {
                $product->price = null;
            }
            if ($request->extra_small) {
                $product->extra_small = $request->extra_small;
            } else {
                $product->extra_small = null;
            }
            if ($request->extra_large) {
                $product->extra_large = $request->extra_large;
            } else {
                $product->extra_large = null;
            }
            if ($request->extra_cheese) {
                $product->extra_cheese = $request->extra_cheese;
            } else {
                $product->extra_cheese = null;
            }
            if ($request->extra_meat) {
                $product->extra_meat = $request->extra_meat;
            } else {
                $product->extra_meat = null;
            }
            if ($request->small_size) {
                $product->small_size = $request->small_size;
            } else {
                $product->small_size = null;
            }
            if ($request->large_size) {
                $product->large_size = $request->large_size;
            } else {
                $product->large_size = null;
            }
            if ($request->donair_small) {
                $product->donair_small = $request->donair_small;
            } else {
                $product->donair_small = null;
            }
            if ($request->donair_large) {
                $product->donair_large = $request->donair_large;
            } else {
                $product->donair_large = null;
            }
            if ($request->specialty) {
                $product->specialty = $request->specialty;
            } else {
                $product->specialty = null;
            }
            if ($request->extra_piece) {
                $product->extra_piece = $request->extra_piece;
            } else {
                $product->extra_piece = null;
            }
            if ($request->platter) {
                $product->platter = $request->platter;
            } else {
                $product->platter = null;
            }
            if ($request->homemade_garlic_souce) {
                $product->homemade_garlic_souce = $request->homemade_garlic_souce;
            } else {
                $product->homemade_garlic_souce = null;
            }
            if ($request->options_for_souce) {
                $product->options_for_souce = $request->options_for_souce;
            } else {
                $product->options_for_souce = null;
            }
            if ($request->product_ctgy) {
                $product->product_ctgy = $request->product_ctgy;
            } else {
                $product->product_ctgy = null;
            }
            if ($request->drink_size) {
                $product->drink_size = $request->drink_size;
            } else {
                $product->drink_size = null;
            }

            $product->descriptions = $request->descriptions;
            $product->category_id = $request->category;

            if ($request->customize) {
                $product->topping_num = count($request->customize);
            } else {
                $product->topping_num = 0;
            }
            if ($request->premium) {
                $product->premium_num = count($request->premium);
            } else {
                $product->premium_num = 0;
            }

            $product->save();

            Artisan::call('cache:clear');

            if ($request->customize and $request->premium) {

                $regular = $request->customize;
                $premium = $request->premium;
                $niz = array_merge($regular, $premium);
                //return $niz;
                $product->customizes()->sync($niz);
            } else if ($request->customize) {

                $regular = $request->customize;
                $product->customizes()->sync($regular);
            } else if ($request->premium) {

                $premium = $request->premium;
                $product->customizes()->sync($premium);
            }

            return redirect()->back()->with('message', 'Product successfully added!');
        } else {
            return view('errors.404Admin');
        }
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
        if (Auth::user()->can('products.view')) {

            $categories = Category::all();
            $customizes = Customize::all();
            $product = Product::where('id', $id)->first();
            return view('admin.products.update', compact('product', 'categories', 'customizes'));
        }else {
            return view('errors.404Admin');
        }
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
        if (Auth::user()->can('products.view')) {

            $product = Product::where('id', $id)->first();

            $product->name = $request->name;

            if ($request->small) {
                $product->small = $request->small;
            } else {
                $product->small = null;
            }
            if ($request->medium) {
                $product->medium = $request->medium;
            } else {
                $product->medium = null;
            }
            if ($request->large) {
                $product->large = $request->large;
            } else {
                $product->large = null;
            }
            if ($request->xlg) {
                $product->xlg = $request->xlg;
            } else {
                $product->xlg = null;
            }
            if ($request->price) {
                $product->price = $request->price;
            } else {
                $product->price = null;
            }
            if ($request->extra_small) {
                $product->extra_small = $request->extra_small;
            } else {
                $product->extra_small = null;
            }
            if ($request->extra_large) {
                $product->extra_large = $request->extra_large;
            } else {
                $product->extra_large = null;
            }
            if ($request->extra_cheese) {
                $product->extra_cheese = $request->extra_cheese;
            } else {
                $product->extra_cheese = null;
            }
            if ($request->extra_meat) {
                $product->extra_meat = $request->extra_meat;
            } else {
                $product->extra_meat = null;
            }
            if ($request->small_size) {
                $product->small_size = $request->small_size;
            } else {
                $product->small_size = null;
            }
            if ($request->large_size) {
                $product->large_size = $request->large_size;
            } else {
                $product->large_size = null;
            }
            if ($request->donair_small) {
                $product->donair_small = $request->donair_small;
            } else {
                $product->donair_small = null;
            }
            if ($request->donair_large) {
                $product->donair_large = $request->donair_large;
            } else {
                $product->donair_large = null;
            }
            if ($request->specialty) {
                $product->specialty = $request->specialty;
            } else {
                $product->specialty = null;
            }
            if ($request->extra_piece) {
                $product->extra_piece = $request->extra_piece;
            } else {
                $product->extra_piece = null;
            }
            if ($request->platter) {
                $product->platter = $request->platter;
            } else {
                $product->platter = null;
            }
            if ($request->homemade_garlic_souce) {
                $product->homemade_garlic_souce = $request->homemade_garlic_souce;
            } else {
                $product->homemade_garlic_souce = null;
            }
            if ($request->options_for_souce) {
                $product->options_for_souce = $request->options_for_souce;
            } else {
                $product->options_for_souce = null;
            }
            if ($request->product_ctgy) {
                $product->product_ctgy = $request->product_ctgy;
            } else {
                $product->product_ctgy = null;
            }
            if ($request->drink_size) {
                $product->drink_size = $request->drink_size;
            } else {
                $product->drink_size = null;
            }
            if ($request->customize) {
                $product->topping_num = count($request->customize);
            } else {
                $product->topping_num = 0;
            }
            if ($request->premium) {
                $product->premium_num = count($request->premium);
            } else {
                $product->premium_num = 0;
            }

            $product->descriptions = $request->descriptions;

            $product->save();

            Artisan::call('cache:clear');

            if ($request->customize and $request->premium) {

                $regular = $request->customize;
                $premium = $request->premium;
                $niz = array_merge($regular, $premium);
                //return $niz;
                $product->customizes()->sync($niz);
            } else if ($request->customize) {

                $regular = $request->customize;
                $product->customizes()->sync($regular);
            } else if ($request->premium) {

                $premium = $request->premium;
                $product->customizes()->sync($premium);
            }

            return redirect()->back()->with('message', 'Product successfully updated!');
        }else {
            return view('errors.404Admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Auth::user()->can('products.view')) {
            $product = Product::where('id', $id)->first();

            $product->delete();
            $product->customizes()->sync($product->customize);

            Artisan::call('cache:clear');

            return redirect()->back()->with('message', 'Successfully was deleted product!');
        }else {
            return view('errors.404Admin');
        }
    }
}
