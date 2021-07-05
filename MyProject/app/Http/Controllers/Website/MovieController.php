<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
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
        } else {
            return response()->json([
                'error'   => true,
                'message' => 'Please login!'
            ]);
        }
    }


}
