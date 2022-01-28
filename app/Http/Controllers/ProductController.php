<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Redirect,Response,DB;
use File;
use PDF;

class ProductController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Product::select('*'))
            ->addColumn('action', 'product-button')
            ->addColumn('image', 'image')
            ->rawColumns(['action','image'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.product');
    } 
 
    public function store(Request $request)
    {  
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
 
        $productId = $request->product_id;
 
        $details = ['title' => $request->title, 'product_code' => $request->product_code, 'description' => $request->description];
 
        if ($files = $request->file('image')) {
            
           //delete old file
           \File::delete('public/product/'.$request->hidden_image);
         
           //insert new file
           $destinationPath = 'public/product/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           $details['image'] = "$profileImage";
        }
         
        $product   =   Product::updateOrCreate(['id' => $productId], $details);  
               
        return Response::json($product);
    } 
 
    public function edit($id)
    {   
        $where = array('id' => $id);
        $product  = Product::where($where)->first();
      
        return Response::json($product);
    }
    public function destroy($id) 
    {
        $data = Product::where('id',$id)->first(['image']);
        \File::delete('public/product/'.$data->image);
        $product = Product::where('id',$id)->delete();
      
        return Response::json($product);
    }
}
