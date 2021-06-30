<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\MovieCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MovieController extends Controller
{
    //
    public function index()
    {
        $data = Movie::paginate(10)->fragment('data');

        return view('admin.Movie.index', compact('data'));
    }

    public function create()
    {
        $movie_category = MovieCategory::where('status', 0)->get();

        return view('admin.Movie.create', compact('movie_category'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|min:3',
            'director'     => 'required',
            'duration'     => 'required',
            'release_date' => 'required',
            'description'  => 'required'
        ], [
            'name.required'         => trans('validation.required'),
            'name.min'              => trans('validation.min'),
            'director.required'     => trans('validation.required'),
            'duration.required'     => trans('validation.required'),
            'release_date.required' => trans('validation.required'),
            'description.required'  => trans('validation.required'),
        ]);
        $image     = '';
        if (!file_exists($request->image)) {
            $image = 'assets\images\up-img.png';
        } else {
            $file  = $request->image;
            $image = $file->move('upload\movie', date('y').'_'.date('m').'_'.$file->getClientOriginalName());
        }
        Movie::create([
            'name'              => $request->name,
            'movie_category_id' => $request->movie_category_id,
            'director'          => $request->director,
            'actors'            => $request->actors,
            'duration'          => $request->duration,
            'release_date'      => $request->release_date,
            'country'           => $request->country,
            'description'       => $request->description,
            'summary'           => $request->summary,
            'content'           => $request->contents,
            'status'            => $request->status,
            'image'             => $image,
        ]);
        Alert::success('Create successfully!');

        return redirect()->route('movie.index');
    }

    public function edit($id)
    {
        $movie          = Movie::find($id);
        $movie_category = MovieCategory::where('status', 0)->get();

        return view('admin.Movie.update', compact('movie', 'movie_category'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|min:3',
            'director'     => 'required',
            'duration'     => 'required',
            'release_date' => 'required',
            'description'  => 'required'
        ], [
            'name.required'         => trans('validation.required'),
            'name.min'              => trans('validation.min'),
            'director.required'     => trans('validation.required'),
            'duration.required'     => trans('validation.required'),
            'release_date.required' => trans('validation.required'),
            'description.required'  => trans('validation.required'),
        ]);
        $movie     = Movie::all()->find($request->id);
        $image     = '';
        if (!file_exists($request->image)) {
            $image = $movie->image;
        } else {
            $file  = $request->image;
            $image = $file->move('upload\movie', date('y').'_'.date('m').'_'.$file->getClientOriginalName());
        }
        $movie->update([
            'name'              => $request->name,
            'movie_category_id' => $request->movie_category_id,
            'director'          => $request->director,
            'actors'            => $request->actors,
            'duration'          => $request->duration,
            'release_date'      => $request->release_date,
            'country'           => $request->country,
            'description'       => $request->description,
            'summary'           => $request->summary,
            'content'           => $request->contents,
            'status'            => $request->status,
            'image'             => $image,
        ]);
        Alert::success('Update successfully!');

        return redirect()->route('movie.index');
    }

    public function delete($id)
    {
        $movie = Movie::all()->find($id);
        $movie->delete();
    }
}
