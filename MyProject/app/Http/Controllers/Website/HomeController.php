<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        //get ds phim
        $data['movie'] = Movie::with('moviecategory')->get();
//        dd($data);
         return view('website.index',compact('data'));
    }
    public function FunctionName()
    {
        # code...
    }
}
