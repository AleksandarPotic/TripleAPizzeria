<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
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
        if (Auth::user()->can('roles.view')) {

            $roles = Role::all();
            return view('admin.roles.roles', compact('roles'));
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

        if (Auth::user()->can('roles.view')) {
            $permissions = Permission::all();
            return view('admin.roles.new', compact('permissions'));
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
        if (Auth::user()->can('roles.view')) {

            $this->validate($request, [
                'name' => 'required|max:50|unique:roles',
                'display_name' => 'required|max:50|unique:roles',
            ]);

            $role = new Role();

            $role->name = $request->name;
            $role->display_name = $request->display_name;

            $role->save();

            $role->permissions()->sync($request->permission);

            return redirect(route('roles.index'))->with('message', 'Role successfully created!');
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

        if (Auth::user()->can('roles.view')) {
            $role = Role::where('id', $id)->first();
            $permissions = Permission::all();
            return view('admin.roles.update', compact('permissions', 'role'));
        } else {
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
        if (Auth::user()->can('roles.view')) {

            $this->validate($request, [
                'name' => 'required|max:50',
                'display_name' => 'required|max:50',
            ]);

            $role = Role::find($id);

            $role->name = $request->name;
            $role->display_name = $request->display_name;

            $role->save();

            $role->permissions()->sync($request->permission);

            return redirect()->back()->with('message', 'Role successfully updated!');
        } else {
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

        if (Auth::user()->can('roles.view')) {
            $role = Role::find($id);

            $role->delete();

            $role->permissions()->sync($role->permission);

            return redirect()->back()->with('message', 'Role successfully deleted!');
        } else {
            return view('errors.404Admin');
        }
    }
}
