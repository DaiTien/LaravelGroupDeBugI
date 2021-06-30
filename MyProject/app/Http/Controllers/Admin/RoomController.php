<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    public function index()
    {
        $data = Room::paginate(10)->fragment('data');
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
            'name'         => 'required|min:3',
            'total_seats'     => 'required',
            'status'     => 'required'
        ], [
            'name.required'         => trans('validation.required'),
            'name.min'              => trans('validation.min'),
            'total_seats.required'     => trans('validation.required'),
            'status.required'     => trans('validation.required')
        ]);
       
        Room::create([
            'name'              => $request->name,
            'total_seats' => $request->total_seats,
            'status'            => $request->status,
        ]);
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
        $validated = $request->validate([
            'name'         => 'required|min:3',
            'total_seats'     => 'required',
            'status'     => 'required'
            
        ], [
            'name.required'         => trans('validation.required'),
            'name.min'              => trans('validation.min'),
            'total_seats.required'     => trans('validation.required'),
            'status.required'     => trans('validation.required'),
        
        ]);
        $room     = Room::all()->find($request->id);
    
        $room->update([
            'name'              => $request->name,
            'total_seats' => $request->total_seats,
            'status'          => $request->status,
        ]);
        Alert::success('Update successfully!');

        return redirect()->route('room.index');
    }

    public function delete($id)
    {
        $room = Room::all()->find($id);
        $room->delete();
    }
}
