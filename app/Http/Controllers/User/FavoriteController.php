<?php

namespace App\Http\Controllers\User;

use App\Model\Product;
use App\User;
use App\User\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        //$cart = Cart::restore('username');
        $id = Auth::user()->id;
        $favorites = Favorite::where('id', $id)->paginate(3);
        $desserts = Product::where('category_id',16)->get();
        $products = Product::where('category_id',2)->get();

        return view('user.favorites',compact('cart','favorites','desserts','products'));
    }
    public function add(Request $request)
    {
        $cart = Cart::restore($request->identifier);
    }

    public function changeInfo(Request $request)
    {
        $id = $request->id;

        $user = User::where('id',$id)->first();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->street_number = $request->street_number;
        $user->postal_code = $request->postal_code;
        $user->email_status = $request->email_status;
        $user->buzzer = $request->buzzer;
        $user->apartment_number = $request->apartment_number;

        $user->credit_card_number = encrypt($request->credit_card_number);
        $user->expiry_month = $request->expiry_month;
        $user->expiry_year = $request->expiry_year;
        $user->cvv = encrypt($request->cvv);



        $user->save();

        return redirect()->back()->with('message_signup','Successfully changed Profile Information!');
    }

    public function changePassword(Request $request)
    {
        $request->all();

        $id = $request->id;

        $user = User::where('id',$id)->first();

        $user->password = bcrypt($request->new_password);

        $user->save();

        return redirect()->back()->with('message_signup','Password successfully changed!');
    }
    public function changeEmail(Request $request)
    {
        //return $request->all();

        $id = $request->id;

        $new_user = User::where('email',$request->new_email)->get();

        if ($new_user->count() > 0) {

            return redirect()->back()->with('message_signup','This Email Address is already in use.');

        }else {

            $user = User::where('id',$id)->first();

            if ($user->email != $request->old_email) {
                return redirect()->back()->with('message_signup','Email Addresses do not match.');
            } else {
                $user->email = $request->new_email;
                $user->save();

                return redirect()->back()->with('message_signup','Email successfully changed!');
            }
        }
    }

    public function delete(Request $request)
    {
        Cart::deleteFavorite($request->identifier);

        $favorites = Favorite::where('id', $request->id)->paginate(3);

        return view('user.favoritesProfile',compact('favorites'));
    }
}
