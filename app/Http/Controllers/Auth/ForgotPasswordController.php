<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

use App\User;
use App\Password_resets;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    // public function index()
    // {
    //     return view('auth.passwords.reset');
    // }

    // public function getForgotPassword(Request $request)
    // {
    // 	//Tạo token và gửi đường link reset vào email nếu email tồn tại
    // 	$result = User::where('email', $request->email)->first();
    // 	if($result){
    // 		$resetPassword = Password_resets::firstOrCreate(['email'=>$request->email, 'token'=>Str::random(60)]);

    // 		$token = Password_resets::where('email', $request->email)->first();
    // 		echo $link = url('resetPassword')."/".$token->token; //send it to email
    // 	} else {
    // 		echo 'Email không có trong hệ thống, vui lòng kiểm tra lại';
    // 	}
    	
    // }
    // public function resetPassword(Request $request)
    // {
    // 	// Check token valid or not
    // 	$result = Password_resets::where('token', $request->token)->first();

    // 	$data['info'] = $result->token;

    // 	if($result){
    // 		return view('newPass', $data);
    // 	} else {
    // 		echo 'This link is expired';
    // 	}
    // }
}
