<?php

namespace App\Http\Controllers\User\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\TripleAAccountCreated;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phoneNumber' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'street_number' => 'required',
            'postal_code' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('status', 'Uspešna registracija. Poslat vam je email za verifikaciju naloga.');
        $user = User::create([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone_number' => $data['phoneNumber'],
            'birthday' => $data['birthday'],
            'address' => $data['address'],
            'street_number' => $data['street_number'],
            'buzzer' => $data['buzzer'],
            'apartment_number' => $data['apartment_number'],
            'postal_code' => $data['postal_code'],
            'email_status' => $data['email_status'],
            'credit_card_number' => encrypt($data['credit_card_number']),
            'expiry_month' => $data['expiry_month'],
            'expiry_year' => $data['expiry_year'],
            'cvv' => encrypt($data['cvv']),
            'points' => 0,
            'used_points' => 0,
            'status' => 0,
            'verifyToken' => Str::random(40)
        ]);

        $thisUser = User::findOrFail($user->id);
        $this->sendEmail($thisUser);
        return $user;
    }
    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new TripleAAccountCreated($thisUser));
    }

    public function verify()
    {
        return view('user.auth.verificationEmail');
    }

    public function sendEmailDone($email,$verifyToken)
    {
        $user = User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();
        if ($user){
            Session::flash('message_signup','Successful verification, your account is now active!');
            User::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>'1','verifyToken'=>NULL]);

            return redirect(route('register'));
        }else{
            return 'User not found!';
        }

    }
}
