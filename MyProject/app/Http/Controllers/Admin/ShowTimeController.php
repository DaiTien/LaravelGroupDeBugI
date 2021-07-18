<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Room;
use App\Models\ShowTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class ShowTimeController extends Controller
{
    //
    public function index()
    {
        $data = ShowTime::with(['movie', 'showTimeRoom'])->where('status', '=', 0)->orderByDesc('id')->paginate(10)->fragment('data');

        return view('admin.ShowTime.index', compact('data'));
    }

    public function create()
    {
        //get list movie and room
        $movie = Movie::where('status', '<>', -1)->get();
        $room = Room::all();

        return view('admin.ShowTime.create', compact('movie', 'room'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'show_date' => 'required',
            'time_start' => 'required',
            'time_end' => 'required'
        ], [
            'show_date.required' => trans('validation.required'),
            'time_start.required' => trans('validation.required'),
            'time_end.required' => trans('validation.required')
        ]);
        $time_start = Carbon::parse($request->time_start)->format('H:i:s');
        $time_end = Carbon::parse($request->time_end)->format('H:i:s');
//        dd($request->all());
        //kiểm tra xem phòng chiếu đó đã có phim nào chiếu vào khung giờ được chọn chưa
        $check_movie = ShowTime::where([['room_id', $request->room], ['show_date', $request->show_date], ['status', 0]])
            ->where(function ($query) use ($time_start, $time_end) {
                $query->whereBetween('time_start', [$time_start, $time_end])
                    ->orWhereBetween('time_end', [$time_start, $time_end]);
            })->get();
//        dd(count($check_movie));
//        die();

        if (count($check_movie) > 0) {
            return back()->withInput($request->all())->with('error', 'Khung giờ chiếu bị trùng');
        } else {
            ShowTime::create([
                'show_date' => $request->show_date,
                'time_start' => $request->time_start,
                'time_end' => $request->time_end,
                'movie_id' => $request->movie,
                'room_id' => $request->room,
                'status' => 0,
            ]);
            Alert::success('Created successfully');

            return redirect()->route('show_time.index');
        }
    }

    public function edit($id)
    {
        $movie = Movie::where('status', 0)->get();
        $room = Room::all();
        $data = ShowTime::with(['movie', 'showTimeRoom'])->where('id', $id)->first();

        return view('admin.ShowTime.update', compact('data', 'movie', 'room'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'show_date' => 'required',
            'time_start' => 'required',
            'time_end' => 'required'
        ], [
            'show_date.required' => trans('validation.required'),
            'time_start.required' => trans('validation.required'),
            'time_end.required' => trans('validation.required')
        ]);
        $time_start = Carbon::parse($request->time_start)->format('H:i:s');
        $time_end = Carbon::parse($request->time_end)->format('H:i:s');
        //kiểm tra xem phòng chiếu đó đã có phim nào chiếu vào khung giờ được chọn chưa
        $check_movie = ShowTime::where([
            ['room_id', $request->room],
            ['show_date', $request->show_date],
            ['status', 0],
            ['id', '<>', $request->id]
        ])->where(function ($query) use ($time_start, $time_end) {
            $query->whereBetween('time_start', [$time_start, $time_end])
                ->orWhereBetween('time_end', [$time_start, $time_end]);
        })->count();
        if ($check_movie > 0) {
            return redirect()->back()->with('error', 'Khung giờ chiếu bị trùng');
        } else {
            $show_time = ShowTime::all()->find($request->id);
            $show_time->update([
                'show_date' => $request->show_date,
                'time_start' => $request->time_start,
                'time_end' => $request->time_end,
                'movie_id' => $request->movie,
                'room_id' => $request->room,
            ]);
            Alert::success('Update successfully!');

            return redirect()->route('show_time.index');
        }
    }

    public function delete($id)
    {
        $show_time = ShowTime::all()->find($id);
        $show_time->update(['status' => 1]);
    }
}
