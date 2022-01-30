<header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('vendor/app/images/logo.png') }}" width="150px" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/products') }}">Products</a></li>

                        @if(auth()->user())
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/account') }}">My Account</a></li>
                                <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menus"><a href="{{ url('/carts') }}"><i class="fa fa-shopping-bag"></i><span class="badge"></span></a></li>
                        
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                            <ul class="dropdown-menu" style="margin-right: 0 auto; margin-left:50%; padding-left: 50%;">
                                
                            @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                                @if(auth()->user()->is_admin == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.home') }}">{{ __('Admin Panel') }}</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('account') }}">{{ __('My Account') }}</a>
                                </li>
                                <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>