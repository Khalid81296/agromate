<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subcategories'] = DB::table('subcategory')
                    ->join('status', 'subcategory.status', '=', 'status.status_id')
                    ->select('subcategory.*', 'status.status_name')
                    ->get();

        $data['page_title'] = "SubCategory List";
         // dd($subcategory);
       return view('admin/subcategory')->with($data);
    }
    public function manage_subcategory()
    {

        $data['categories'] = DB::table('categories')
                    ->select('categories.type', 'categories.id')
                    ->get();
        $data['page_title'] = "Add SubCategory";
        return view('admin/manage_subcategory')->with($data);
    }

    public function saveSubCategory(Request $request)
    {
        // File upload
        // dd($request->all());
        if($request->product_image != NULL){
            $fileName = $request->court.'_'.time().'.'.$request->product_image->extension();
            $request->product_image->move(public_path('uploads/product_image/'), $fileName);
        }else{
            $fileName = NULL;
        }
       DB::table('subcategory')->insert([
            'product_name'=>$request->product_name,
            'category_id' =>$request->category,
            'description' =>$request->description,
            'price' =>$request->price,
            'product_image' =>$fileName,
            'status' =>1

       ]);

       return redirect('admin/subcategory')->with('product_add','Product added successfully');
    }

    public function editSubCategory($id)
    {
        $category = DB::table('subcategory')->where('id',$id)->first();
        return view('admin/edit_category',compact('category'));
    }
    public function updateSubCategory(Request $request)
    {
        // print_r($request->id);exit('ali');
         // File upload
        /*if($request->show_cause != NULL){
            $fileName = $request->court.'_'.time().'.'.$request->show_cause->extension();
            $request->show_cause->move(public_path('uploads/product_image/'), $fileName);
        }else{
            $fileName = NULL;
        }*/
        DB::table('subcategory')->where('id',$request->id)->update([
            'type'=>$request->type,
            'description' =>$request->description,
            'status' =>$request->status,
            // 'product_image' =>$fileName,
            // 'price' =>$request->price
        ]);
        return redirect('admin/subcategory')->with('product_update','Product updated Successfully') ;
        
    }

    public function deleteSubCategory($id)
    {
        DB::table('subcategory')->where('id',$id)->delete();
        return redirect()->back()->with('product_delete','Product delete Successfully') ;
    }

    public function status($status,$id)
    {
        // echo "<pre>";
        // echo $id;
        // dd($status);
        DB::table('subcategory')->where('id',$id)->update(['status' =>$status]);
        return redirect()->back()->with('status_update','Status updated Successfully') ;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
}
