<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
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
        return Validator::make($data, [
            'first_name' => ['required', 'regex: /[a-zA-Z]/', 'max:255'],
            'last_name' => ['required', 'regex: /[a-zA-Z]/', 'max:255'],
            'address' => ['required', 'regex: /[a-zA-Z]/', 'max:255'],
            'phone_number' => ['required', 'regex:/^0[0-9]{9}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6',
                            'regex:/^.*(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d).*$/', 'confirmed'],
        ],
        [
            'first_name.required' => "Tên không được để trống.",
            'last_name.required' => "Họ không được để trống.",
            'address.required' => "Địa chỉ không được để trống.",
            'phone_number.required' => "Số điện thoại không được để trống.",
            'email.required' => "Email không được để trống.",
            'password.required' => "Mật khẩu không được để trống.",

            'first_name.regex' => "Tên không hợp lệ.",
            'last_name.regex' => "Họ không hợp lệ.",
            'address.regex' => "Địa chỉ không hợp lệ.",
            'phone_number.regex' => "Số điện thoại không hợp lệ.",
            'password.regex' => "Mật khẩu phải có ít nhất 1 chữ cái hoa và 1 kí tự đăc biệt.",

            'first_name.max' => "Tên không được quá 255 kí tự.",
            'last_name.max' => "Họ không được quá 255 kí tự.",
            'address.max' => "Địa chỉ không được quá 255 kí tự.",
            'email.max' => "Email không được quá 255 kí tự.",
            
            'password.min' => "Mật khẩu phải có ít nhất 6 kí tự.",

            'email.unique' => "Email đã được đăng ký.",
            'password.confirmed' => "Mật khẩu không khớp."

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
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
