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
        // $data = ProductCategory::All()->sortByDesc('id');
        $data = ProductCategory::query()
            ->leftJoin('product_categories as parent','product_categories.parent_id','=','parent.id')
            ->selectRaw('product_categories.*, parent.name as parent_name')
            ->orderByDesc('id')
            ->simplePaginate(3);
        return view('ProductCategory.Index', compact('data'));
    }
    //redirect form add category
    function AddProductCategory()
    {
        $categories = ProductCategory::query()->where('parent_id', 0)->get();
        return view('ProductCategory.Add', ['categories' => $categories]);
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
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect('list-product-category');
    }
    //redirect form update
    function UpdateProductCategory($id)
    {
        $categories = ProductCategory::query()->where('parent_id', 0)->get();
        $category = ProductCategory::all()->find($id);
        return view('ProductCategory.Update', ['categories' => $categories])->with('category',$category);
    }
    //save update
    function SaveUpdateProductCategory(Request $request)
    {
        $category = ProductCategory::all()->find($request->id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'tag' => $request->tag,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id
        ]);
        // DB::table('product_categories')->where([
        //     'id' => $request->id
        // ])->update(
        //     [
        //         'name' => $request->name,
        //         'description' => $request->description,
        //         'tag' => $request->tag,
        //         'slug' => $request->slug,
        //         'active' => $request->active
        //     ]
        // );
        return redirect('list-product-category');
    }
    function DeleteProductCategory($id)
    {
        $category = ProductCategory::all()->find($id);
        $category->delete();
        return redirect('list-product-category');
    }
}
