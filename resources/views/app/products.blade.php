@extends('layouts.app')

@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(Request::path() == 'products')
                    <h2>Products</h2>
                    @elseif(Request::path() == 'products/category/lego-city')
                    <h2>Products Lego City</h2>
                    @elseif(Request::path() == 'products/category/lego-classic')
                    <h2>Products Lego Classic</h2>
                    @elseif(Request::path() == 'products/category/lego-batman')
                    <h2>Products Lego Batman</h2>
                    @elseif(Request::path() == 'products/category/lego-architecture')
                    <h2>Products Lego Architecture</h2>
                    @else
                    <h2>Products</h2>
                    @endif
                    
                    <ul class="breadcrumb">
                    @if(Request::path() == 'products')
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    @elseif(Request::path() == 'products/category/lego-city')
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/products') }}">Products</a></li>
                        <li class="breadcrumb-item active">Lego City</li>
                    @elseif(Request::path() == 'products/category/lego-classic')
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/products') }}">Products</a></li>
                        <li class="breadcrumb-item active">Lego Classic</li>
                    @elseif(Request::path() == 'products/category/lego-batman')
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/products') }}">Products</a></li>
                        <li class="breadcrumb-item active">Lego Batman</li>
                    @elseif(Request::path() == 'products/category/lego-architecture')
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/products') }}">Products</a></li>
                        <li class="breadcrumb-item active">Lego Architecture</li>
                    @else

                    @endif
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <a href="{{ route('category.city') }}" class="list-group-item list-group-item-action">Lego City</a>
                                <a href="{{ route('category.classic') }}" class="list-group-item list-group-item-action">Lego Classic</a>
                                <a href="{{ route('category.batman') }}" class="list-group-item list-group-item-action">Lego Batman</a>
                                <a href="{{ route('category.architecture') }}" class="list-group-item list-group-item-action">Lego Architecture</a>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Nothing</option>
									<option value="1">Popularity</option>
									<option value="2">High Price → High Price</option>
									<option value="3">Low Price → High Price</option>
									<option value="4">Best Selling</option>
								</select>
                                </div>
                                <p>Showing all 4 results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                            @foreach ($products as $idx => $product)
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <a href="{{ route('products.show', ['id' => $product->id]) }}"><img src="{{ route('products.image', ['imageName' => $product->image_url]) }}"
                                href="{{ route('products.show', ['id' => $product->id]) }}" class="img-fluid"></a>
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="{{ route('carts.add', ['id' => $product->id]) }}">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>{{ $product->name }}</h4>
                                                    <h5>Rp. {{ number_format($product->price) }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach ($products as $idx => $product)
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="sale">Sale</p>
                                                        </div>
                                                        <img src="{{ route('products.image', ['imageName' => $product->image_url]) }}" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4>{{ $product->name }}</h4>
                                                    <h5>Rp. {{ number_format($product->price) }}</h5>
                                                    <p>{{ $product->description }}</p>
                                                    <a class="btn hvr-hover" href="{{ route('carts.add', ['id' => $product->id]) }}">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
@endsection