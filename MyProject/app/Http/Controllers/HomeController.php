<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        return view('admin.Template.admin_layout',compact('user'));
    }
    function layout()
    {
        $user = Auth::user();
        // dd($user);
        return view('admin.Template.admin_layout',compact('user'));
    }
    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin');
    }
    //change language
    public function ChangLanguage($language)
    {
        \Session::put('website_language', $language);
        return redirect()->back();
    }
}
