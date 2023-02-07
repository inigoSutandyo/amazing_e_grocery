<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function toRegister() {
        return view('auth.register');
    }
    public function toLogin() {
        return view('auth.login');
    }
}
