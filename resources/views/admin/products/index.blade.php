@extends('admin.layouts.app')

@section('content')
<div class="right_col" role="main">
    <div class="container col-md-8">
        <div class="row justify-content-center">
            <div class="col">
                <h2>Product</h2>
                <div>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><span class="fa fa-plus"></span></a>
                </div>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><img src="{{ route('products.image', $product->image_url) }}" width="75px" /></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->category_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                            class="btn btn-info btn-sm"><span class="fa fa-pencil"></span></a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}"
                                            method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')"><span class="fa fa-trash"></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 