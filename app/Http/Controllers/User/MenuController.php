<?php

namespace App\Http\Controllers\User;

use App\Model\Category;
use App\Model\Product;
use App\Model\WorkingTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class MenuController extends Controller
{
    public function menu()
    {
        return view('user.categoryMenu');
    }
    public function index()
    {
        //$minutes = 40320;
        $products = Cache::rememberForever('products', function () {
            return Product::all();
        });
        $categories = Cache::rememberForever('users', function () {
            return Category::all();
        });

        $cat = Category::where('slug',request()->category)->get();

        if ($cat->count() != 0) {
            $categoryName = $categories->where('slug',request()->category)->first()->name;
            $categorySlug = $categories->where('slug',request()->category)->first()->slug;
            $categoryId = $categories->where('slug',request()->category)->first()->id;
        } else {
            return view('errors.404');
        }

        return view('user.menu',compact('products','categories','categoryName','categorySlug','categoryId'));
    }
    
    public function addCart(Request $request)
    {
        return $request->all();
    }

    public function popUp(Request $request)
    {
        $id = $request->id;

        $working_time = WorkingTime::where('name','on_off')->first();
        $product = Product::where("id", $id)->first();
        $categoryName = $product->category->name;

        return view('user.popUp',compact('product', 'categoryName','working_time'));
    }
}
