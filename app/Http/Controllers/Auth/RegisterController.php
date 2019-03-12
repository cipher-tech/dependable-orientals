<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\RegisterMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

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
    protected $redirectTo = '/register';

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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:225',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|unique:users|max:11',
            'password' => 'required|string|min:6|confirmed',
            'sex' => 'required|string|max:6|min:4',
            'address' => 'required|string|min:4',
            'file' => 'mimes:jpg,gif,png,webp,jpeg|file|image|max:10024',
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
        if ($data['file']){
            $file = $data['file'];
            $fileName = $data['name'] . ' ' . $data['surname'] .'C.V'. time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('photos', $fileName);
        } 
        $user = $data['name'];
        $email = $data['email'];

        User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => bcrypt($data['password']),
            'sex' => $data['sex'],
            'address' => $data['address'],
            'file' => $path,

        ]);
        
            //Mail::to("nickchibuikem@gmail.com")
           // ->send(new RegisterMail($user, $email));

        
    }
}
