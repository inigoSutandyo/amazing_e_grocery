<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    public function profile() {
        $account = auth()->user();
        return view('account.profile', compact('account'));
    }

    public function update(Request $request) {
        $account = Account::find(auth()->user()->account_id);
        $password = $request->password;
        if (isset($password) && !empty($password)) {
            $attr = $request->validate([
                'email'=>['required','email',Rule::unique('accounts','email')->ignore($account->account_id, 'account_id')],
                'first_name'=>'required|max:25|alpha_num',
                'last_name'=>'required|max:25|alpha_num',
                'display_picture_link'=>'required|mimes:jpg,png',
                'password'=>['required','min:8',Password::min(8)->numbers(), 'confirmed'],
                'password_confirmation'=>['required','min:8',Password::min(8)->numbers()],
                'gender_id'=>'required|in:1,2',
            ]);
            $attr['password'] = bcrypt($attr['password']);
        } else {
            $attr = $request->validate([
                'email'=>['required','email',Rule::unique('accounts','email')->ignore($account->account_id, 'account_id')],
                'first_name'=>'required|max:25|alpha_num',
                'last_name'=>'required|max:25|alpha_num',
                'display_picture_link'=>'required|mimes:jpg,png,jpeg',
                'gender_id'=>'required|in:1,2',
            ]);
        }

        $file = $request->file('display_picture_link');
        $name = date('YmdHi') . '.' . $request->file('display_picture_link')->getClientOriginalName();
        $file->move(public_path('\storage\images\accounts'), $name);
        $attr['display_picture_link'] = 'images/accounts/'.$name;

        $account->update($attr);
        $account->save();
        return view('account.success');
    }

    public function maintenance() {
        $accounts = Account::all();
        return view('account.maintenance', compact('accounts'));
    }

    public function role($id) {
        $account = Account::find($id);

        return view('account.role', compact('account'));
    }
    public function updateRole(Request $request, $id) {
        $request->validate([
            'role_id' => 'in:1,2|required'
        ]);
        $account = Account::find($id);
        $account->role_id = $request->role_id;
        $account->save();
        return redirect()->route('account.maintenance');
    }

    public function destroy($id) {
        Account::find($id)->delete();
        return redirect()->route('account.maintenance');
    }
}
