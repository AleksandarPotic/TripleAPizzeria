<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Model\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
        if (Auth::user()->can('admins.view')) {

            $roles = Role::all();
            $admins = Admin::all();
            return view('admin.admins.admins', compact('admins', 'roles'));
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
        if (Auth::user()->can('admins.view')) {


            $roles = Role::all();
            return view('admin.admins.new', compact('roles'));
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
        if (Auth::user()->can('admins.view')) {

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:admins',
                'password' => 'required|string|min:6',
                'role' => 'required',
            ]);
            $admin = new Admin();

            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);
            $admin->role_id = $request->role;

            $admin->save();

            return redirect()->back()->with('message', 'Admin successfully created!');
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
        if (Auth::user()->can('admins.view')) {

            $roles = Role::all();
            $admin = Admin::where('id', $id)->first();
            return view('admin.admins.update', compact('admin', 'roles'));
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
        if (Auth::user()->can('admins.view')) {

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'role' => 'required',
            ]);

            $admin = Admin::where('id', $id)->first();

            $admin->name = $request->name;
            $admin->role_id = $request->role;
            if ($request->password) {
                $admin->password = bcrypt($request->password);
            }

            $admin->save();

            return redirect()->back()->with('message', 'Admin successfully updated!');
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
        if (Auth::user()->can('admins.view')) {

            $admin = Admin::where('id', $id)->first();

            $admin->delete();

            return redirect()->back()->with('message', 'Admin successfully deleted!');
        } else {
            return view('errors.404Admin');
        }
    }
}
