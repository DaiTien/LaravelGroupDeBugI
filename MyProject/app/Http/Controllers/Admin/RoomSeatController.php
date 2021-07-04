<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomSeat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

use function Symfony\Component\String\s;

class RoomSeatController extends Controller
{
    //

    public function index()
    {
        //get list room;
        $room = Room::where('status', 0)->get();
        //lấy ds ghế của phòng đầu tiên
        $name_seat = RoomSeat::select('id', 'name','status')->where('room_id', '=', $room[0]->id)->groupBy('name')->get();
        $arr_seat = [];
        foreach ($name_seat as $seat) {
            $arr_seat[$seat->name] = RoomSeat::where([
                ['room_id', '=', $room[0]->id],
                ['name', '=', $seat->name]
            ])->get();
        }
        $data['name_seat'] = $name_seat;
        $data['seat']      = $arr_seat;
//        dd($data );
        return view('admin.RoomSeat.index', compact('room', 'data'));
    }
}
