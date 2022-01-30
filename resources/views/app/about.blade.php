@extends('layouts.app')

@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>ABOUT US</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">ABOUT US</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<div class="about-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="noo-sh-title">We are <span>Toko Lego</span></h2>
                <p>"Lego A/S is a Danish toy production company based in Billund. It manufactures Lego-brand toys, consisting mostly of interlocking plastic bricks. <br>  only the best is good enough"</p>
            </div>
            <div class="col-lg-6">
                <div class="banner-frame"> <img class="img-thumbnail img-fluid" src="{{ asset('vendor/app/images/about.jpg') }}" alt="" />
                </div>
            </div>
        </div>
        <br><hr>
        <div class="row my-6">
            <div class="col-12">
                <h2 class="noo-sh-title">Meet Our Team</h2>
            </div>
            <div class="col-sm-6">
                <div class="hover-team">
                    <div class="our-team">
                        <div class="team-conten">
                            <h3 class="title">Ilham Alfath</h3>
                        </div>
                    </div>
                    <div class="team-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                    </div>
                    <hr class="my-0"> 
                </div>
            </div>
            <div class="col-sm-6">
                <div class="hover-team">
                    <div class="our-team">
                        <div class="team-conten">
                            <h3 class="title">Widi</h3>
                        </div>
                    </div>
                    <div class="team-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                    </div>
                    <hr class="my-0"> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
