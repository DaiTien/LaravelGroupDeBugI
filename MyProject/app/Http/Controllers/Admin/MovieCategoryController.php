<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MovieCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class MovieCategoryController extends Controller
{
    //
    public function index()
    {
        $data = MovieCategory::paginate(10)->fragment('data');

        return view('admin.MovieCategory.index', compact('data'));
    }

    //chuển sang form create
    public function create()
    {
        return view('admin.MovieCategory.create');
    }

    public function store(Request $request)
    {
        //check validator
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3'
            ],
            [
                'name.required' => trans('validation.required'),
                'name.min'      => trans('validation.min'),
            ]
        );
        if ($validated->fails()) {
            return response()->json([
                'errors' => TRUE,
                'name'   => $validated->errors()->first('name'),
            ]);
        }
        MovieCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-')
        ]);

        return response()->json(['success' => 'Data is successfully added']);
    }

    public function edit($id)
    {
        //get movie cate with id = $id
        $data = MovieCategory::all()->find($id);

        //return edit page
        return view('admin.MovieCategory.update', compact('data'));
    }

    public function update(Request $request)
    {
        //check validate
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3'
            ],
            [
                'name.required' => trans('validation.required'),
                'name.min'      => trans('validation.min'),
            ]
        );
        if ($validated->fails()) {
            return response()->json([
                'errors' => TRUE,
                'name'   => $validated->errors()->first('name'),
            ]);
        }
        // get data
        $movie_cate = MovieCategory::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-')
        ]);


        return response()->json(['success' => 'Data is successfully added']);
    }

    public function DeleteMovieCategory($id)
    {
        $cate = MovieCategory::find($id);
        $cate->delete();
    }
}
