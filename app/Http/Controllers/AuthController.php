<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function toRegister() {
        return view('auth.register');
    }
    public function toLogin() {
        return view('auth.login');
    }

    public function register(Request $request) {
        $request->validate([
            'email'=>'required|max:100|unique:accounts,email|email',
            'first_name'=>'required|max:25|alpha_num',
            'last_name'=>'required|max:25|alpha_num',
            'display_picture_link'=>'required|max:100|mimes:jpg,png',
            'password'=>['required','min:8',Password::min(8)->numbers()],
            'confirm_password'=>['required','min:8',Password::min(8)->numbers()],
            'role_id'=>'required|in:1,2',
            'gender_id'=>'required|in:1,2',
        ]);
    }
}
