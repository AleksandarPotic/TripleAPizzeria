<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SendMail;
use App\Model\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
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
        if (Auth::user()->can('messages')) {
            $comments = Contact::all();
            return view('admin.message.message', compact('comments'));
        }else {
            return view('errors.404Admin');
        }
    }
    public function destroy($id)
    {
        $comment = Contact::where('id',$id)->first();

        $comment->delete();

        return redirect()->back()->with('message', 'Message deleted successfully!');
    }
}
