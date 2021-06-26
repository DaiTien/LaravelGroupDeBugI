<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;
use Illuminate\Auth\Events\Validated;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductCategoryController extends Controller
{
    //
    //

    function GetAll()
    {
        // $data = ProductCategory::All()->sortByDesc('id');
        $data = ProductCategory::query()
            ->leftJoin('product_categories as parent', 'product_categories.parent_id', '=', 'parent.id')
            ->selectRaw('product_categories.*, parent.name as parent_name')
            ->orderByDesc('id')->paginate(10);
        // dd($data);
        // $data = ProductCategory::query()->paginate('5');
        // $parent = ProductCategory::query()->where('parent_id', 0)->get();
        return view('ProductCategory.Index', compact('data'));
    }
    //redirect form add category
    function AddProductCategory()
    {
        $parent = ProductCategory::query()->where('parent_id', 0)->get();
        return view('ProductCategory.Add', compact('parent'));
    }
    //save product category
    function SaveProductCategory(Request $request)
    {
        //chek validation
        // $validated = $request->validated();
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'description' => 'required'
            ],
            [
                'name.required' => 'Name is required!',
                'description.required' => 'Description is required'
            ]
        );
        if ($validated->fails()) {
            return response()->json([
                'errors' => true,
                'name' => $validated->errors()->first('name'),
                'description' => $validated->errors()->first('description')
            ]);
        }
        ProductCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'tag' => $request->tag,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,
            'active' => $request->active
        ]);
        return response()->json(['success' => 'Data is successfully added']);
    }
    //redirect form update
    function UpdateProductCategory($id)
    {
        $category = ProductCategory::all()->find($id);
        $parent = ProductCategory::query()->where('parent_id', 0)->get();
        return view('ProductCategory.Update', compact('category', 'parent'));
    }
    //save update
    function SaveUpdateProductCategory(Request $request)
    {
        $category = ProductCategory::all()->find($request->id);
        $validated = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'description' => 'required'
            ],
            [
                'name.required' => 'Name is required!',
                'description.required' => 'Description is required'
            ]
        );
        if ($validated->fails()) {
            return response()->json([
                'errors' => true,
                'name' => $validated->errors()->first('name'),
                'description' => $validated->errors()->first('description')
            ]);
        }
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'tag' => $request->tag,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,
            'active' => $request->active,
        ]);
        return response()->json(['success' => 'Data is successfully added']);
    }
    function DeleteProductCategory($id)
    {
        $category = ProductCategory::find($id);
        $count = ProductCategory::where('parent_id', $id)->count();
        //kiểm tra xem cate đã có sp nào chưa
        $check = Product::where('category_id', $id)->count();
        // dd($check);
        if ($category && $count == 0 && $check == 0) {
            $category->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
    //update status
    function UpdateStatus(Request $request)
    {
        // dd($request->id);
        $category = ProductCategory::find($request->category_id);
        $category->update([
            'active' => $request->active,
        ]);
        return response(['status' => $request->active]);
    }
}
