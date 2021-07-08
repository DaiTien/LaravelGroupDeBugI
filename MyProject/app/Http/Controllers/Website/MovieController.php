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

    public function detail($slug, $id)
    {
        $movie = Movie::with('moviecategory')->where('id', $id)->first();
        return view('website.details_movies', compact('movie'));
    }


    //add movie favourite
    public function add_favourite(Request $request, $id)
    {
        $user = session()->get('customer');
        if ($user) {
            MovieFavorite::create([
                'user_id' => Session::get('customer')->id,
                'movie_id' => $id,
                'status' => '0'
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
    public function book_ticket(Request $request, $movie_id)
    {
        //ktra xem đã login chưa
        $user = Session::get('customer');
        if (!$user) {
            return redirect()->route('signin');
        } else {
            Carbon::setLocale('vi');
            //lấy ds7 ngày trong tuần
            $now = Carbon::now('Asia/Ho_Chi_Minh')->timestamp;
            $week = [];
            for ($i = 0; $i < 7; $i++) {
                $date = Carbon::now()->addRealDays($i)->timestamp;
                $thu = getdate($date)['weekday'];
                $week[$thu] = date('d/m', $date);
            }
            //get ds suất chiếu của ngày đầu tiên trong mảng
//            $current_date = $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $key = getdate()['weekday'];
            $current_date = date('Y-m-d', $now);
            $suat_chieu = ShowTime::with('showTimeRoom')->where([['show_date', $current_date], ['movie_id', $movie_id], ['status', 0]])->get();
            foreach ($suat_chieu as $value) {
                $value->time_start = date('H:i', strtotime($value->time_start));
                $value->time_end = date('H:i', strtotime($value->time_end));
            }
            $data = $suat_chieu;
            $movie = Movie::with('moviecategory')->where('id', $movie_id)->first();
            return view('website.book_ticket', compact('week', 'data', 'key','movie'));
        }
    }
}
