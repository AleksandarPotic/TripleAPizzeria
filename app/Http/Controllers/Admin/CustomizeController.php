<?php

namespace App\Http\Controllers\Admin;

use App\Model\Customize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomizeController extends Controller
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
        if (Auth::user()->can('customizes.view')) {
            $customizes = Customize::all();
            return view('admin.customize.customize', compact('customizes'));
        }else {
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
        if (Auth::user()->can('customizes.view')) {

            return view('admin.customize.new');
        }else {
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
        if (Auth::user()->can('customizes.view')) {

            $validatedData = $request->validate([
                'name' => 'required'
            ]);

            $customize = new Customize();

            $customize->name = $request->name;
            //$customize->size = $request->size;
            //$customize->for = $request->for;
            $customize->customize_price = $request->customize_price;
            $customize->medium_price = $request->medium_price;
            $customize->large_price = $request->large_price;
            $customize->xlg_price = $request->xlg_price;
            $customize->regular_premium = $request->regular_premium;
            $customize->customize_category = $request->customize_category;

            $customize->save();

            return redirect()->back()->with('message', 'Customize successfully added!');
        }else {
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
        if (Auth::user()->can('customizes.view')) {

            $customize = Customize::where('id', $id)->first();

            return view('admin.customize.update', compact('customize'));
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
        if (Auth::user()->can('customizes.view')) {

            $validatedData = $request->validate([
                'name' => 'required'
            ]);

            $customize = Customize::where('id', $id)->first();

            $customize->name = $request->name;
            //$customize->display_name = $request->display_name;
            //$customize->for = $request->for;
            $customize->customize_price = $request->customize_price;
            $customize->medium_price = $request->medium_price;
            $customize->large_price = $request->large_price;
            $customize->xlg_price = $request->xlg_price;
            $customize->regular_premium = $request->regular_premium;
            $customize->customize_category = $request->customize_category;

            $customize->save();

            return redirect()->route('customize.index')->with('message', 'Customize successfully updated!');
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
        if (Auth::user()->can('customizes.view')) {

            $customize = Customize::where('id', $id)->first();

            $customize->delete();

            return redirect()->back()->with('message', 'Customize successfully deleted!');
        } else {
            return view('errors.404Admin');
        }
    }
}
