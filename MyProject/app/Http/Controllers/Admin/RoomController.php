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
            'name'               => 'required|min:3',
            'row_seats'          => 'required|numeric|max:10',
            'total_seats_of_row' => 'required',
        ], [
            'name.required'               => trans('validation.required'),
            'name.min'                    => trans('validation.min'),
            'row_seats.required'          => trans('validation.required'),
            'row_seats.numeric'          => trans('validation.numeric'),
            'row_seats.max'               => trans('validation.max'),
            'total_seats_of_row.required' => trans('validation.required'),
        ]);
        $room      = Room::create([
            'name'               => $request->name,
            'total_seats'        => $request->row_seats * $request->total_seats_of_row,
            'row_seats'          => $request->row_seats,
            'total_seats_of_row' => $request->total_seats_of_row,
            'status'             => $request->status,
        ]);
        //array tên dãy ghế
        $arr_Name = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
        // insert data roomseat
        for ($i = 0; $i < $request->row_seats; $i++) {
            for ($j = 1; $j <= $request->total_seats_of_row; $j++) {
                RoomSeat::create([
                    'room_id'     => $room->id,
                    'name'        => $arr_Name[$i],
                    'seat_number' => $j
                ]);
            }
        }
        Alert::success('Create successfully!');

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
        $validated  = $request->validate([
            'name'               => 'required|min:3',
            //            'total_seats'        => 'required',
            'row_seats'          => 'required',
            'total_seats_of_row' => 'required',
            //            'status'             => 'required'

        ], [
            'name.required'               => trans('validation.required'),
            'name.min'                    => trans('validation.min'),
            //            'total_seats.required'        => trans('validation.required'),
            'row_seats.required'          => trans('validation.required'),
            'total_seats_of_row.required' => trans('validation.required'),
            //            'status.required'             => trans('validation.required'),

        ]);
        $room       = Room::all()->find($request->id);
        $seat       = RoomSeat::where('room_id', $request->id)->get();
        $seatByName = RoomSeat::query()->select('*', DB::raw('count(room_seats.seat_number) as count_seat'))->where('room_id', $request->id)->groupBy('name')->get();
        dd($seatByName[0]->count_seat);
        die();
        $room->update([
            'name'               => $request->name,
            'total_seats'        => $request->row_seats * $request->total_seats_of_row,
            'row_seats'          => $request->row_seats,
            'total_seats_of_row' => $request->total_seats_of_row,
            'status'             => $request->status,
        ]);

        //array tên dãy ghế
        $arr_Name = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
        //get ds ghế cũ
        $total_dayghe = $request->row_seats;
        $total_soghe  = $request->total_seats_of_row;
        if ($total_dayghe < count($seatByName)) {//nếu sô dãy update nhỏ hơn số dãy ban đầu có
            if ($total_soghe < $seatByName[0]->count_seat) { //sô ghê mới ít hơn sô ghế ban đầu có
                for ($i = 0; $i < $total_dayghe; $i++) {
                    for ($j = 1; $j <= $request->$total_soghe; $j++) {
                    }
                }
            }
        }
        Alert::success('Update successfully!');

        return redirect()->route('room.index');
    }

    public function delete($id)
    {
        $room = Room::all()->find($id);
        $room->delete();
    }
}
