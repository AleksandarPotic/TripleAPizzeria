<?php

namespace App\Http\Controllers\User;

use App\Model\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;


class ContactUsController extends Controller
{
    public function index()
    {
        return view('user.contactUs');
    }
    public function store(Request $request)
    {
        //return $request->all();

        Mail::to('info@tripleapizzeria.ca')->send(new SendMail());
        
        return redirect()->back()->with('message_s','Email successfully sent!');
    }
}
