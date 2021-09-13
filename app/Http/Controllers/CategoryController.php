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
        $categories = DB::table('categories')
                    ->join('status', 'categories.status', '=', 'status.status_id')
                    ->select('categories.*', 'status.status_name')
                    ->get();
         // dd($categories);
       return view('admin/category', compact('categories'));
    }
    public function manage_category()
    {
       return view('admin/manage_category');
    }

    public function saveProduct(Request $request)
    {
        // File upload
        /*if($request->show_cause != NULL){
            $fileName = $request->court.'_'.time().'.'.$request->show_cause->extension();
            $request->show_cause->move(public_path('uploads/product_image/'), $fileName);
        }else{
            $fileName = NULL;
        }*/
       DB::table('categories')->insert([
            'type'=>$request->type,
            'description' =>$request->description,
            // 'price' =>$request->price,
            // 'product_image' =>$fileName,
            'status' =>1

       ]);

       return redirect('admin/category')->with('product_add','Product added successfully');
    }

    public function editCategory($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('admin/edit_category',compact('category'));
    }
    public function updateCategory(Request $request)
    {
        // print_r($request->id);exit('ali');
         // File upload
        /*if($request->show_cause != NULL){
            $fileName = $request->court.'_'.time().'.'.$request->show_cause->extension();
            $request->show_cause->move(public_path('uploads/product_image/'), $fileName);
        }else{
            $fileName = NULL;
        }*/
        DB::table('categories')->where('id',$request->id)->update([
            'type'=>$request->type,
            'description' =>$request->description,
            'status' =>$request->status,
            // 'product_image' =>$fileName,
            // 'price' =>$request->price
        ]);
        return redirect('admin/category')->with('product_update','Product updated Successfully') ;
        
    }

    public function deleteCategory($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return redirect()->back()->with('product_delete','Product delete Successfully') ;
    }

    public function status($status,$id)
    {
        // echo "<pre>";
        // echo $id;
        // dd($status);
        DB::table('categories')->where('id',$id)->update(['status' =>$status]);
        return redirect()->back()->with('status_update','Status updated Successfully') ;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
}
