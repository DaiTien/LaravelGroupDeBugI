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

    public function index(Request $request)
    {
        dd($request->session()->has('admin'));
        //get list room;
        $room = Room::where('status', 0)->get();
        //lấy ds ghế của phòng đầu tiên
        $name_seat = RoomSeat::select('id', 'name', 'status')->where('room_id', '=', $room[0]->id)->groupBy('name')->get();
        $arr_seat  = [];
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

    public function disable(Request $request)
    {
        $arr_id    = explode(',', $request->ds_id);
        $room_seat = RoomSeat::where('room_id', $request->room)
            ->whereIn('id', $arr_id)->update(['status' => '1']);
        if ($room_seat) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'error'   => true,
                'message' => "Has error"
            ]);
        }
    }

    public function enable(Request $request)
    {
        $arr_id    = explode(',', $request->ds_id);
        $room_seat = RoomSeat::where('room_id', $request->room)
            ->whereIn('id', $arr_id)->update(['status' => '0']);
        if ($room_seat) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return response()->json([
                'error'   => true,
                'message' => "Has error"
            ]);
        }
    }

    public function change_room($id)
    {
        //get list room;
        $room = Room::where('status', 0)->get();
        //lấy ds ghế của phòng  id
        $name_seat = RoomSeat::select('id', 'name', 'status')->where('room_id', '=', $id)->groupBy('name')->get();
        $arr_seat  = [];
        foreach ($name_seat as $seat) {
            $arr_seat[$seat->name] = RoomSeat::where([
                ['room_id', '=', $id],
                ['name', '=', $seat->name]
            ])->get();
        }
        $data['name_seat'] = $name_seat;
        $data['seat']      = $arr_seat;

        return view('admin.RoomSeat.change_room', compact('data', 'room'));
//        return response()->json([
//            'status'   => 'success',
//            'map_data' => $returnHTML,
//        ]);
    }

}
