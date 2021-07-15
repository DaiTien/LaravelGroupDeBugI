<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\BookTicket;
use App\Models\BookTicketDetail;
use App\Models\Movie;
use App\Models\MovieFavorite;
use App\Models\PriceTicket;
use App\Models\RoomSeat;
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
        foreach ($suat_chieu as $value) {
            $value->time_start = date('H:i', strtotime($value->time_start));
            $value->time_end = date('H:i', strtotime($value->time_end));
        }
        $data = $suat_chieu;
        return view('website.book_ticker_change_date', compact('data'));
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
                $thu = date('Y-m-d', $date);
                $week[$thu] = date('d/m', $date);
            }
            //get ds suất chiếu của ngày đầu tiên trong mảng
//            $current_date = $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $current_date = date('Y-m-d', $now);
            $suat_chieu = ShowTime::with('showTimeRoom')->where([['show_date', $current_date], ['movie_id', $movie_id], ['status', 0]])->get();
            foreach ($suat_chieu as $value) {
                $value->time_start = date('H:i', strtotime($value->time_start));
                $value->time_end = date('H:i', strtotime($value->time_end));
            }
            $data = $suat_chieu;
//            dd($suat_chieu);
            $movie = Movie::with('moviecategory')->where('id', $movie_id)->first();
            return view('website.book_ticket', compact('week', 'data', 'movie'));
        }
    }

    public function choose_ticket($movie_id, $date, $show_id)
    {
        $user = Session::get('customer');
//        dd($user);
        $movie = Movie::with('moviecategory')->where('id', $movie_id)->first();
        $show = ShowTime::with('showTimeRoom')->where('id', $show_id)->first();
        $show->time_start = date('H:i', strtotime($show->time_start));
        $show->show_date = date('d-m-Y', strtotime($show->show_date));
        //load gia ve
        $price_ticket = PriceTicket::all();
        return view('website.details_chonve', compact('price_ticket', 'movie', 'show', 'user'));
    }

    public function choose_seat($show_id)
    {
        $room = ShowTime::select('room_id')->where('id', $show_id)->first();
        $room_id = $room->room_id;
//        dd($room_id);
        $name_seat = RoomSeat::select('id', 'name', 'status')->where('room_id', '=', $room_id)->groupBy('name')->get();
//        dd($name_seat);
        $arr_seat = [];
        //get ds đã book của phim trong suất
        $seat_book = BookTicket::select('seats_id')->where('show_time_id', $show_id)->get();
        foreach ($name_seat as $seat) {
            $arr_seat[$seat->name] = RoomSeat::where([
                ['room_id', '=', $room_id],
                ['name', '=', $seat->name]
            ])->get();
            foreach ($arr_seat[$seat->name] as $item) {

                if (Str::contains($seat_book, $item->id)) {
                    $item->status = '2';
                }
            }
        }
        $data['name_seat'] = $name_seat;
        $data['seat'] = $arr_seat;
//        dd($data['seat']);
        return view('website.details_chonghe', compact('data'));
    }

    public function save_book_ticket(Request $request)
    {

//        dd($request->all());
        $type1 = $request->ticket_1;
        $arr_1 = explode(',', $type1);
        $type2 = $request->ticket_2;
        $arr_2 = explode(',', $type2);
        $type3 = $request->ticket_3;
        $arr_3 = explode(',', $type3);
        $book_ticket = BookTicket::create([
            'user_id' => $request->user_id,
            'movie_id' => $request->movie_id,
            'show_time_id' => $request->show_time_id,
            'total_seat' => $request->count_seats,
            'total_price' => $request->price,
            'discount' => "0",
            'status' => "0",
            'seats_id' => $request->seats_id,
        ]);
        if ($type1 != null) {
            $book_detail = BookTicketDetail::create([
                'user_id' => $request->user_id,
                'book_ticket_id' => $book_ticket->id,
                'type_price_id' => $arr_1[0],
                'quantity' => $arr_1[1],
                'price' => $arr_1[2],
            ]);

        }
        if ($type2 != null) {
            $book_detail = BookTicketDetail::create([
                'user_id' => $request->user_id,
                'book_ticket_id' => $book_ticket->id,
                'type_price_id' => $arr_2[0],
                'quantity' => $arr_2[1],
                'price' => $arr_2[2],
            ]);

        }
        if ($type3 != null) {
            $book_detail = BookTicketDetail::create([
                'user_id' => $request->user_id,
                'book_ticket_id' => $book_ticket->id,
                'type_price_id' => $arr_3[0],
                'quantity' => $arr_3[1],
                'price' => $arr_3[2],
            ]);

        }
        return \response()->json([
            'success' => true,
            'status' => Response::HTTP_OK,
            'message' => 'Cảm ơn bạn đã đặt vé trên hệ thống'
        ]);
    }
}
