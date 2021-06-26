<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    //
    function getAll()
    {
        $data = Product::with('categories')->get();
        // dd($data);
        // ->leftJoin('product_categories','product_categories.id','=','products.category_id')
        // ->selectRaw('products.*')
        return view('Product.Index', compact('data'));
    }
    //add-product
    function CreateProduct()
    {
        $category = ProductCategory::query()->where('parent_id', '!=', 0)->get();
        // dd($category);
        return view('Product.Create', compact('category'));
    }
    //save create
    function SaveCreate(Request $request)
    {
        // dd($request->price);
        $validated = $request->validate([
            'name' => 'required',
            'introduce' => 'required',
            'price' => 'required'
        ]);
        $image = '';
        if (!file_exists($request->image)) {
            $image = 'assets\images\up-img.png';
        } else {
            $file = $request->image;
            $image = $file->move('upload', $file->getClientOriginalName());
        }
        // $path = $request->file('image')->store('image');
        $file = $request->image;
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'introduce' => $request->introduce,
            'detail' => $request->detail,
            // 'image' => $request->image,
            'price' => $request->price,
            'image' => $image,
            'slug' => $request->slug,
            'active' => $request->active
        ]);
        Alert::success('Create successfully!');
        return back();
    }
    //update product
    function UpdateProduct($id)
    {
        $product = Product::find($id);
        $category = ProductCategory::query()->where('parent_id', '!=', 0)->get();
        return view('Product.Update', compact('product', 'category'));
    }
    //save update
    function SaveUpdate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'introduce' => 'required',
            'price' => 'required'
        ]);

        $product = Product::all()->find($request->id);
        $image = '';
        if (!file_exists($request->image)) {
            $image = $product->image;
        } else {
            $file = $request->image;
            $image = $file->move('upload', $file->getClientOriginalName());
        }
        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'introduce' => $request->introduce,
            'detail' => $request->detail,
            'price' => $request->price,
            'image' => $image,
            'slug' => $request->slug,
            'active' => $request->active,
        ]);
        Alert::success('Create successfully!');
        return redirect('product/index');
    }
    function DeleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
