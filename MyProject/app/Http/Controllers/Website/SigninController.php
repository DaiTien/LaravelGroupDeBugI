<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SigninController extends Controller
{
    public function signin()
    {
        return view('website.signin');
    }

    public function signup()
    {
        return view('website.signup');
    }

    public function login_customer(Request $request)
    {
        $validated = $request->validate([
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ],
            [
                'email.required'    => trans('validation.required'),
                'email.string'      => trans('validation.string'),
                'email.email'       => trans('validation.email'),
                'password.required' => trans('validation.required'),
                'password.string'   => trans('validation.string'),
            ]);
        //check emaiil có tồn tại hay không
        $check_mail = User::where([
            ['email', $request->email],
            ['group_id', 2],
            ['active', 1]
        ])->first();
        if (!$check_mail) {
            return back()->withInput($request->all())->with('message', 'Email không đúng!');
        } else {
            //check password
            if (Hash::check($request->password, $check_mail->password)) {
//                customer
                Session::put('customer', $check_mail);

                return redirect('/')->with('success', 'Đăng nhập thành công!');
            } else {
                return back()->withInput($request->all())->with('message', 'Mật khẩu không đúng!');;
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
