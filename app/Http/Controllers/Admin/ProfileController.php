<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
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
    public function index()
    {
        return view('admin.admins.profile');
    }
    public function store(Request $request)
    {
        $admin = Admin::where('id', $request->id)->first();

        $image = $request->get('image-data');
        $info = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));

        $imgName = 'public/'.Str::random(8).'.png';
        Storage::put($imgName, $info);

        $admin->image = $imgName;

        $admin->save();

        return redirect()->back();
    }
}
