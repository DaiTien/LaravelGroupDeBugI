<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\MovieFavorite;
use App\Models\ShowTime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
                'user_id'  => Session::get('customer')->id,
                'movie_id' => $id,
                'status'   => '0'
            ]);

            return back();
        } else {
            return redirect()->route('signin');
        }
    }

    //load ds suất chiếu của phim theo ngày
    public function get_showtime_by_date($phim_id, $date)
    {
        $suat_chieu = ShowTime::query()->where([['movie_id', $phim_id], ['show_date', $date], ['status', 0]])->get();

        return \response()->json(['status' => Response::HTTP_OK, 'data' => $suat_chieu]);
    }

    //from book ticker
    public function book_ticket(Request $request)
    {
        //lấy ds7 ngày trong tuần
        $now  = Carbon::now();
//        dd($now->format('Y-m-d'));
        $week = [];

        for ($i = 0; $i < 7; $i++) {
            $week['Thứ '.($i + 2)] = $now->startOfWeek()->addDay($i)->format('Y-m-d');
        }
        dd($now->format('Y-m-d'));
        die();
    }
}
