<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomSeat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    public function index()
    {
        $data = Room::where('status', 0)->paginate(10)->fragment('data');

        // dd($data);die();
        return view('admin.rooms.index', compact('data'));
    }

    //chuển sang form create
    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'row_seats' => 'required|numeric|max:10',
            'total_seats_of_row' => 'required|numeric',
        ], [
            'name.required' => trans('validation.required'),
            'name.min' => trans('validation.min'),
            'row_seats.required' => trans('validation.required'),
            'row_seats.numeric' => trans('validation.numeric'),
            'row_seats.max' => trans('validation.max'),
            'total_seats_of_row.required' => trans('validation.required'),
            'total_seats_of_row.numeric' => trans('validation.numeric'),
        ]);
        $room = Room::create([
            'name' => $request->name,
            'total_seats' => $request->row_seats * $request->total_seats_of_row,
            'row_seats' => $request->row_seats,
            'total_seats_of_row' => $request->total_seats_of_row,
            'status' => $request->status,
        ]);
        //array tên dãy ghế
        $arr_Name = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
        // insert data roomseat
        for ($i = 0; $i < $request->row_seats; $i++) {
            for ($j = 1; $j <= $request->total_seats_of_row; $j++) {
                RoomSeat::create([
                    'room_id' => $room->id,
                    'name' => $arr_Name[$i],
                    'seat_number' => $j,
                    'status' => '0'
                ]);
            }
        }
        Alert::success('Thêm mới thành công!');

        return redirect()->route('room.index');
    }

    public function edit($id)
    {
        //get movie cate with id = $id
        $room = Room::all()->find($id);

        //return edit page
        return view('admin.rooms.update', compact('room'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',

        ], [
            'name.required' => trans('validation.required'),
            'name.min' => trans('validation.min'),

        ]);
        $room = Room::all()->find($request->id);
        $room->update([
            'name' => $request->name,
        ]);
        Alert::success('Cập nhật thành công!');

        return redirect()->route('room.index');
    }

    public function delete($id)
    {
        $room = Room::all()->find($id);
        $room->delete();
    }

    public function list_seat_by_room($room_id)
    {
        $room = Room::where('status', 0)->get();
        foreach ($room as $item) {
            if ($item->id == $room_id) {
                $item->status = 1;
            }
        }
        $name_seat = RoomSeat::select('id', 'name', 'status')->where('room_id', '=', $room_id)->groupBy('name')->get();
        $arr_seat = [];
        foreach ($name_seat as $seat) {
            $arr_seat[$seat->name] = RoomSeat::where([
                ['room_id', '=', $room_id],
                ['name', '=', $seat->name]
            ])->get();
        }
        $data['name_seat'] = $name_seat;
        $data['seat'] = $arr_seat;
        return view('admin.RoomSeat.list_seat_by_room', compact('room', 'data'));
    }
}
