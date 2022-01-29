@extends('admin.layouts.app')

@section('content')
<div class="right_col" role="main">
    <div class="container col-md-12">
        <div class="row justify-content-center">
            <div class="col">
                <h2>Edit Product</h2>
                <div>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary"><span class="fa fa-arrow-left"></span></a>
                </div>
                <hr>
                <br>
            </div>
        </div>
        @if(count($errors))
                <div class="form-group">
                    <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label> Nama Produk </label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Produk" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                    <label> Harga </label>
                    <input type="number" name="price" class="form-control" placeholder="Harga" value="{{ $product->price }}">
                </div>
                <div class="form-group">
                    <label> Deskripsi </label>
                    <textarea name="description" class="form-control" id="ckview" rows="3" placeholder="Deskripsi">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label> Gambar</label>
                    <input class=" form-control" type="file" name="image_url" value="{{ old('image_url') }}" />
                    <p class="form-text"><span class="text-danger">*</span> Fill blank it if you don't want to update.</p>
                    <img src="{{ $product->image_url() }}" width="100" />
                </div><br>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i> Submit</button>
            </form>
    </div>
</div>
@endsection 