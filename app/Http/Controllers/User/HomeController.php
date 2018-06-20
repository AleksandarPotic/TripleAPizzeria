<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void

     */
    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

    public function index()
    {
        return view('user.home');
    }

    public function home()
    {
        return view('user.h');
    }
}
