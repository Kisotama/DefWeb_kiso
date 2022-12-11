<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
     $data = Product::get();
    //  return $data;
    return view('product-list', compact('data'));

    }

    public function index2(){
        $data = Product::select('products.*','categories.cat_name')
        ->join('categories','products.categoryID', '=', 'categories.id')
        ->get();
        return view('product-list', compact('data'));

    }

    // public function index3(){
    //     return view ('Customers/index');
    // }

    public function add(){
        $data = Category::get();
        return view('product-add', compact('data'));
    }
    public function save(Request $request){

        $input = $request->except('_token');
        if ($request->hasFile('image')) {
            $thumbnail_file = $request->file('image');

            // LẤY TÊN FILE
            $thumbnail_file_name = $thumbnail_file->getClientOriginalName();

            // UPLOAD FILE
            $thumbnail_file->move('Image', $thumbnail_file_name);
            $thumbnail = $thumbnail_file_name;

            $input['image'] = $thumbnail;
        }

        Product::create($input);


        return redirect('product-list')->with('Success', 'Product Added Successfully !');
    }

    public function edit($ID){
        $cat_list = Category::get()->pluck('cat_name', 'id');
        $data = Product::where('ID', '=', $ID)->first();
        return view('product-edit', compact('data', 'cat_list'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'ID' => 'required',
            'Name'=> 'required',
            'Price'=> 'required',
            'Image'=> 'required|image|mimes:png,jpg,jpeg|max:2048',
            'Category'=> 'required',
            'Actions'=> 'required',
        ]);

        $input = $request->except('_token');

        if ($request->hasFile('image')) {
            $thumbnail_file = $request->file('image');

            // LẤY TÊN FILE
            $thumbnail_file_name = $thumbnail_file->getClientOriginalName();

            // UPLOAD FILE
            $thumbnail_file->move('Image', $thumbnail_file_name);
            $thumbnail = $thumbnail_file_name;

            $input['image'] = $thumbnail;
        }

        Product::find($id)->update($input);

        return redirect('product-list')->with('Success', 'Product Update Successfully !');

    }
}

