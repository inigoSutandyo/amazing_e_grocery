<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $attr = $request->validate([
            'email'=>'required|unique:accounts,email|email',
            'first_name'=>'required|max:25|alpha_num',
            'last_name'=>'required|max:25|alpha_num',
            'display_picture_link'=>'required|mimes:jpg,png',
            'password'=>['required','min:8',Password::min(8)->numbers(), 'confirmed'],
            'password_confirmation'=>['required','min:8',Password::min(8)->numbers()],
            'role_id'=>'required|in:1,2',
            'gender_id'=>'required|in:1,2',
        ]);
        $file = $request->file('display_picture_link');
        $name = date('YmdHi') . '.' . $request->file('display_picture_link')->getClientOriginalName();
        $file->move(public_path('\storage\images\accounts'), $name);
        $attr['display_picture_link'] = 'images/accounts/'.$name;
        Account::create($attr);
        return redirect('/');
    }

    public function login(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>['required','min:8',Password::min(8)->numbers()]
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return view('auth.successful');
        }else {
            return back()->with('error', __('auth.failed'));
        }
    }

    public function sucess() {
        return view('auth.successful');
    }

    public function logout() {
        Auth::logout();
        return view('auth.logout');
    }
}
