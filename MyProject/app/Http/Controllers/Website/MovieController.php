<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\MovieFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class MovieController extends Controller
{
    //

    public function detail($id)
    {
        $movie = Movie::with('moviecategory')->where('id', $id)->first();

        return view('website.details', compact('movie'));
    }


    //add movie favourite
    public function add_favourite(Request $request, $id)
    {
        $user = session()->get('customer');
        if ($user) {
            MovieFavorite::create([
                'user_id'=>Session::get('customer')->id,
                'movie_id'=>$id,
                'status'=>'0'
            ]);
        } else {
            return redirect()->route('signin');
        }
    }


}
