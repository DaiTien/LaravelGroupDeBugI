<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Introduce;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class IntroduceController extends Controller
{
    //

    public function index()
    {
        $introduce = Introduce::first();

        return view('admin.Introduce.index', compact('introduce'));
    }

    public function edit($id)
    {
        $introduce = Introduce::all()->find($id);

        return view('admin.Introduce.update', compact('introduce'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required|min:10',
            'summary'  => 'required',
            'contents' => 'required'
        ], [
            'title.require'    => trans('validation.required'),
            'title.min'        => trans('validation.min'),
            'summary.require'  => trans('validation.required'),
            'contents.require' => trans('validation.required'),
        ]);
        $introduce = Introduce::all()->find($request->id);
        $image     = '';
        if (!file_exists($request->image)) {
            $image = $introduce->image;
        } else {
            $file  = $request->image;
            $image = $file->move('upload', $file->getClientOriginalName());
        }
        $introduce = Introduce::where('id', $request->id)->update([
            'title'   => $request->title,
            'summary' => $request->summary,
            'content' => $request->contents,
            'image'   => $image,
            'slug'    => Str::slug($request->title, '-'),
        ]);
        Alert::success('Update successfully!');

        return redirect()->route('introduce.index');
    }

}
