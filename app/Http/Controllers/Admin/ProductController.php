<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
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
        $products = Product::select("products.id", "products.name", "products.price", "products.image_url", "categories.category_name"
        )
        ->join("categories", "products.id", "=", "categories.id")
        ->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.products.create', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        $products = new Product();
        $products->user_id = Auth::user()->id;
        $products->category_id = $request->post('category');
        $products->name = $request->post('name');
        $products->price = $request->post('price');
        $products->description = $request->post('description');
        if ($request->hasFile('image_url')) {
            $image_url = $request->file('image_url');
            $name = rand(1000, 9999) . $image_url->getClientOriginalName();
            $image_url->move('images/image/', $name);
            $products->image_url = $name;
        }

        $products->save();

        return redirect('admin/products')->with('success', 'Produk berhasil di simpan');
    }

    public function show($id)
    {
        $detail = Product::where('id', $id)->get()->first();
        return view('admin.products.detail', compact('detail'));
    }

    public function edit($id)
    {
        $products = Product::select("products.id", "products.name", "products.price", "products.description", "products.image_url", "categories.category_name"
        )
        ->join("categories", "products.id", "=", "categories.id")
        ->where('products.id', $id)
        ->get()
        ->first();

        $category = Category::all();
        return view('admin.products.edit', compact('products', 'category'));
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

    public function destroy(Product $product)
    {
        $product->delete_image_url();
        $product->delete();
        return redirect('admin/products')->with('success', 'Produk Berhasil di Hapus');
    }

    public function image($imageName)
    {
        $filePath = public_path('images/image/' . $imageName);
        return Image::make($filePath)->response();
    }
}
