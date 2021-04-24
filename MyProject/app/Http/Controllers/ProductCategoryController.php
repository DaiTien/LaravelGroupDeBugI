<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    //
    //
    function GetAll()
    {
        $data = ProductCategory::All()->sortByDesc('id');
        return view('ProductCategory.Index', compact('data'));
    }
    //redirect form add category
    function AddProductCategory()
    {
        return view('ProductCategory.Add');
    }
    //save product category
    function SaveProductCategory(Request $request)
    {
        $category = new ProductCategory();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->tag = $request->tag;
        $category->slug = $request->slug;
        $category->active = $request->active;
        $category->save();
        return redirect('list-product-category');
    }
    //redirect form update
    function UpdateProductCategory($id)
    {
        $category = ProductCategory::all()->find($id);
        return view('ProductCategory.Update', compact('category'));
    }
    //save update
    function SaveUpdateProductCategory(Request $request)
    {
        // $category = Category::all()->find($request->id);
        // $category->update([
        //     'name' = $request->name,
        //     'description' = $request->description,
        //     'tag' = $request->tag,
        //     'slug' = $request->slug
        // ]);
        DB::table('product_categories')->where([
            'id' => $request->id
        ])->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'tag' => $request->tag,
                'slug' => $request->slug,
                'active' => $request->active
            ]
        );
        return redirect('list-product-category');
    }
    function DeleteProductCategory($id)
    {
        $category = ProductCategory::all()->find($id);
        $category->delete();
        return redirect('list-product-category');
    }
}
