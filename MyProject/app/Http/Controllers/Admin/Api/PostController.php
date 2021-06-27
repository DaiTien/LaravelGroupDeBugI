<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::all();
        return view('admin.Post.index', compact('data'));
    }

    public function create()
    {
        //get post category
        $cate = PostCategory::all();
        return view('admin.Post.create', compact('cate'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create validation
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'summary' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'name' => $validator->errors()->first('name'),
                'summary' => $validator->errors()->first('summary'),
            ]);
        }
        if (Post::create($request->all()))
            return response()->json(['success' => true]);
        else
            response()->json(['success' => false]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //

    }
}
