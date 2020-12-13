<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\SellerDetail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        if(isset($data['type']) && $data['type'] == 'seller'){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'string','regex:/^(?:\+88|01)?(?:\d{11}|\d{13})$/','max:255', 'unique:users'],
                'gender' => ['required', 'string'],
                'nid' => ['required', 'string', 'unique:seller_details'],
                'tin' => ['required', 'string', 'unique:seller_details'],
                'company_name' => ['required', 'string'],
                'bkash' => ['required', 'string', 'unique:seller_details', 'regex:/^(?:\+88|01)?(?:\d{11}|\d{13})$/'],
                'rocket' => ['required', 'string', 'unique:seller_details', 'regex:/^(?:\+88|01)?(?:\d{12}|\d{14})$/'],
                'dob' => ['required'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }else{
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => ['required', 'string','regex:/^(?:\+88|01)?(?:\d{11}|\d{13})$/','max:255', 'unique:users'],
                'gender' => ['required', 'string'],
                'dob' => ['required'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $users = User::all();
        if(count($users) > 0){
            if(isset($data['type']) && $data['type'] == 'seller'){
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'gender' => $data['gender'],
                    'dob' => $data['dob'],
                    'type' => 'seller',
                    'password' => Hash::make($data['password']),
                ]);
                SellerDetail::create([
                    'user_id'  => $user->id,
                    'nid' => $data['nid'],
                    'tin' => $data['tin'],
                    'company_name' => $data['company_name'],
                    'bkash' => $data['bkash'],
                    'rocket' => $data['rocket'],
                ]);
                return $user;
            }else{
                return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'gender' => $data['gender'],
                    'dob' => $data['dob'],
                    'type' => 'user',
                    'approved' => true,
                    'password' => Hash::make($data['password']),
                ]);
            }
        }else{
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'gender' => $data['gender'],
                'dob' => $data['dob'],
                'type' => 'admin',
                'approved' => true,
                'password' => Hash::make($data['password']),
            ]);
        }
    }
}
