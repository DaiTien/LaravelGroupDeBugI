<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookTicket;
use App\Models\RoomSeat;
use Illuminate\Http\Request;

class BookTicketController extends Controller
{
    //
    public function index()
    {

//        $data['a'] = M
        $data = BookTicket::with('user', 'movie')
            ->orderByRaw('status ASC, id DESC')->get();
        return view('admin.BookTicket.index', compact('data'));
    }

    public function detail($book_id)
    {
        $seat = BookTicket::where('id', $book_id)->first();
        $arr_seat = explode(',', $seat->seats_id);
//        dd($arr_seat);
        $data['detail'] = BookTicket::query()->with('bookticketdetails')
            ->leftJoin('show_times', 'show_times.id', '=', 'book_tickets.show_time_id')
            ->leftJoin('rooms', 'show_times.room_id', '=', 'rooms.id')
//            ->leftJoin('room_seats', 'rooms.id', '=', 'room_seats.room_id')
            ->where('book_tickets.id', $book_id)
//            ->whereIn('room_seats.id', $arr_seat)
            ->select('book_tickets.*', 'rooms.id', 'rooms.name as room_name')
            ->first();
        $data['name_seat'] = RoomSeat::select('room_seats.name as seat_name', 'room_seats.seat_number as seat_location')
            ->whereIn('room_seats.id', $arr_seat)->orderBy('room_seats.seat_number','ASC')
            ->get();
//        dd($name_seat);
//        dd($data);
//        , 'room_seats.name as seat_name', 'room_seats.seat_number as seat_location'
        return view('admin.BookTicket.detail', compact('data'));
    }

    public function confirm($book_id)
    {
        $book = BookTicket::where('id', $book_id)->update(['status' => '1']);
        if ($book) {
            return response()->json([
                'success' => true,
                'message' => "Success"
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => "Has error"
            ]);
        }

    }

    public function cancel(Request $request, $book_id)
    {
        $book = BookTicket::where('id', $book_id)->update(['status' => '2', 'lydohuy' => $request->lydo]);
        if ($book) {
            return response()->json([
                'success' => true,
                'message' => "Success"
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => "Has error"
            ]);
        }
    }
}
