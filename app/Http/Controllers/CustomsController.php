<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Password_resets;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Notifications\ResetPasswordNotification;

class CustomsController extends Controller
{
    // public function sendMail(Request $request)
    // {
    //     $user = User::where('email', $request->email)->firstOrFail();
    //     $passwordReset = Password_resets::updateOrCreate([
    //         'email' => $user->email,
    //     ], [
    //         'token' => Str::random(60),
    //     ]);
    //     if ($passwordReset) {
    //         $user->notify(new ResetPasswordNotification($passwordReset->token));
    //     }
  
    //     return response()->json([
    //     'message' => 'We have e-mailed your password reset link!'
    //     ]);
    // }

    // public function reset(Request $request, $token)
    // {
    //     $passwordReset = Password_resets::where('token', $token)->firstOrFail();
    //     if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
    //         $passwordReset->delete();

    //         return response()->json([
    //             'message' => 'This password reset token is invalid.',
    //         ], 422);
    //     }
    //     $user = User::where('email', $passwordReset->email)->firstOrFail();
    //     $updatePasswordUser = $user->update($request->only('password'));
    //     $passwordReset->delete();

    //     return response()->json([
    //         'success' => $updatePasswordUser,
    //     ]);
    // }
}
