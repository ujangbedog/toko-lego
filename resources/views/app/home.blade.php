@extends('layouts.app')

@section('content')
<div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="{{ asset('vendor/app/images/banner-lego-2.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> The Toko Lego</strong></h1>
                                <p class="m-b-40">Only the best is good enough.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="{{ asset('vendor/app/images/banner-lego-1.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br>The Toko Lego</strong></h1>
                            <p class="m-b-40">Only the best is good enough.</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="{{ asset('vendor/app/images/banner-lego-3.jpg') }}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br>The Toko Lego</strong></h1>
                            <p class="m-b-40">Only the best is good enough..</p>
                            <p><a class="btn hvr-hover" href="#">Shop New</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->
    <br><br>

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="title-all text-center">
                <h1>Category Products</h1>
            </div>
            <div class="row">    
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('vendor/app/images/category/city.jpg') }}" alt="" />
                        <a class="btn hvr-hover" href="#">Lego City</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('vendor/app/images/category/batman.jpg') }}" alt="" />
                        <a class="btn hvr-hover" href="#">Lego Batman</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('vendor/app/images/category/classic.jpg') }}" alt="" />
                        <a class="btn hvr-hover" href="#">Lego Classic</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{ asset('vendor/app/images/category/architecture.jpg') }}" alt="" />
                        <a class="btn hvr-hover" href="#">Lego Architecture</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories -->

    
@endsection
