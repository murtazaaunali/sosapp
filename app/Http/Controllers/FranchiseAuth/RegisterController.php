<?php

namespace App\Http\Controllers\FranchiseAuth;

use App\Franchise;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Validator;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/franchise/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('franchise.guest');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:franchises',
            'Location' => 'required|max:255',
            'City' => 'required|max:255',
            'State' => 'required|max:255',
            'Address' => 'required',
            'DateOpened' => 'date_format:Y-m-d|required',
            'DateFDDSigned' => 'date_format:Y-m-d|required',
            'DateFDDExpires' => 'date_format:Y-m-d|required',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Franchise
     */
    protected function create(array $data)
    {
        return Franchise::create([
            'name' => $data['name'],
            'Location' => $data['Location'],
            'Address' => $data['Address'],
            'City' => $data['City'],
            'State' => $data['State'],
            'DateOpened' => $data['DateOpened'],
            'DateFDDSigned' => $data['DateFDDSigned'],
            'DateFDDExpires' => $data['DateFDDExpires'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status' => '0',
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('franchise.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('franchise');
    }
}
