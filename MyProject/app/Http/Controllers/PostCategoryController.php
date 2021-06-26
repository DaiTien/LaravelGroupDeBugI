<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostCategory;

class PostCategoryController extends Controller
{
    //
    public function index()
    {
        $data = PostCategory::all();
        return view('PostCategory.index', compact('data'));
    }
    public function create(){
        return view('PostCategory.create');
    }
}
