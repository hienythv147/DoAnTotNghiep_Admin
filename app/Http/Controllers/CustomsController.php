<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class CustomsController extends Controller
{
    public function showRequestEmail()
    {
        return view('auth.passwords.reset');
    }
}
