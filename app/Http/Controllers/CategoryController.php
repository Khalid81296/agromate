<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
         
       return view('admin/category', compact('categories'));
    }
    public function manage_category()
    {
       return view('admin/manage_category');
    }

    public function saveProduct(Request $request)
    {
       DB::table('categories')->insert([
            'type'=>$request->type,
            'description' =>$request->description,
            'status' =>$request->status,
            'price' =>$request->price
       ]);

       return redirect('admin/category')->with('product_add','Product added successfully');
    }

    public function editProduct($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('admin/edit_category',compact('category'));
    }
    public function updateProduct(Request $request)
    {
        // print_r($request->id);exit('ali');
        DB::table('categories')->where('id',$request->id)->update([
            'type'=>$request->type,
            'description' =>$request->description,
            'status' =>$request->status,
            'price' =>$request->price
        ]);
        return redirect('admin/category')->with('product_update','Product updated Successfully') ;
        
    }

    public function deleteProduct($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->back()->with('product_delete','Product delete Successfully') ;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
}
