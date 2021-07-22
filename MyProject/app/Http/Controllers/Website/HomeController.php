<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Introduce;
use App\Models\Movie;
use App\Models\MovieCategory;
use App\Models\UserManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index(Request $request)
    {


        //get movie slide
        $data['slide'] = Movie::with('moviecategory')->take(3)->orderByDesc('id')->get();
        //get ds phim
        $data['movie'] = Movie::with('moviecategory')->get();
        //get ds loại phim
        $data['movie_cate'] = MovieCategory::all();

        $data['intro'] = Introduce::first();
        // dd($data['intro']-> image);
        //phim mới
        $data['movie_new'] = Movie::with('moviecategory')->take(5)->orderByDesc('release_date')->get();

        //movie by cate
        $data['cate'] = MovieCategory::query()->has('movies')->get();
        $arr_movie = [];
        foreach ($data['cate'] as $cate) {
            $arr_movie[$cate->id] = Movie::with('moviecategory')->has('moviecategory')->where('movie_category_id', $cate->id)->get();
        }
        $data['moviebycat'] = $arr_movie;
//        dd($data['moviebycat']);die();
//        dd($data);
        return view('website.index', compact('data'));
    }

    //get about
    public function about_us()
    {
        $about = Introduce::all();
        return view('website.about', compact('about'));
    }


    //user info
    public function info()
    {
        $user_id = Session::get('customer')->id;
//        dd($user);die();
        if (!$user_id) {
            return redirect('/');
        } else {
            $user = UserManager::find($user_id);
            return view('website.info', compact('user'));
        }
    }

    //update info
    public function updateinfo(Request $request)
    {
//        dd($request->all());

        $validated = $request->validate([
            'name'     => 'required|min:3',
            'phone'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address'  => 'required'
        ], [
            'name.required'    => trans('validation.required'),
            'name.min'         => trans('validation.min'),
            'phone.required'   => trans('validation.required'),
            'phone.regex'      => trans('validation.regex'),
            'phone.min'        => trans('validation.min'),
            'address.required' => trans('validation.required'),
        ]);
        $user      = UserManager::all()->find($request->id);
        $user->update([
            'name'     => $request->name,
            'phone'    => $request->phone,
            'address'  => $request->address,

        ]);
        return redirect()->back()->with('message','Cập nhật thông tin thành công!');

    }
}
