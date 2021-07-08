<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Introduce;
use App\Models\Movie;
use App\Models\MovieCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){


        //get movie slide
        $data['slide'] = Movie::with('moviecategory')->take(3)->orderByDesc('id')->get();
        //get ds phim
        $data['movie'] = Movie::with('moviecategory')->get();
        //get ds loại phim
        $data['movie_cate']= MovieCategory::all();
        //phim mới
        $data['movie_new'] = Movie::with('moviecategory')->take(5)->orderByDesc('release_date')->get();
         return view('website.index',compact('data'));
    }
    //get about
    public function about_us()
    {
        $about = Introduce::all();
        return view('website.about', compact('about'));
    }
}
