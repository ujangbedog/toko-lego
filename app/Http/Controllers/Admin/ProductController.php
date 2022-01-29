<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $products = Product::all();
        $products = Product::where('user_id', Auth::user()->id)->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'description' => 'required',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        
        $file = $request->file('image_url');
        $ext = $file->getClientOriginalExtension();

        $dateTime = date('Ymd_his');
        $newName = 'image_' . $dateTime . '.' . $ext;

        $file->move(storage_path(env('PATH_IMAGE_PRODUCT')), $newName);

        $product = new Product();
        $product->user_id = Auth::user()->id;
        $product->name = $request->post('name');
        $product->price = $request->post('price');
        $product->description = $request->post('description');
        $product->image_url = $newName;
        $product->save();

        return redirect('admin/products')->with('success', 'Produk berhasil di simpan');
    }

    public function show($id)
    {
        $detail = Product::where('id', $id)->get()->first();
        return view('admin.products.detail', compact('detail'));
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->get()->first();
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request->post('name');
        $product->price = $request->post('price');
        $product->description = $request->post('description');
        $product->save();

        return redirect('admin/products')->with('success', 'Produk berhasil di update');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        redirect('/admin/products')->with('success', 'Produk berhasil di hapus');
    }

    public function viewImage($imageName)
    {
        $filePath = storage_path(env('PATH_IMAGE') . 'products/' . $imageName);
        return Image::make($filePath)->response();
    }
}
