@extends('layouts.app')

@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <form class="needs-validation" action="{{ route('orders.store') }}" method="POST" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First name *</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" value="" required>
                                    <div class="invalid-feedback"> Valid first name is required. </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name *</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="" value="" required>
                                    <div class="invalid-feedback"> Valid last name is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="number">Phone Number *</label>
                                <input type="number" class="form-control" name="number" id="number" placeholder="">
                                <div class="invalid-feedback"> Please enter a valid phone number for shipping updates. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address2">Address 2</label>
                                <input type="text" class="form-control" id="address2" name="address2" placeholder=""> </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">City *</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="">
                                    <div class="invalid-feedback"> Please select a valid city. </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">Province *</label>
                                    <input type="text" class="form-control" id="province" name="province" placeholder="">
                                    <div class="invalid-feedback"> Please provide a valid province. </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip Code *</label>
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="" required>
                                    <div class="invalid-feedback"> Zip code required. </div>
                                </div>
                            </div>
                            <hr class="mb-4"> 
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                @php $total = 0 @endphp
                                    @if(session('cart'))
                                        @foreach (session('cart') as $id => $product)
                                            @php $total += $product['price'] * $product['quantity'] @endphp
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="detail.html"> {{ $product['name'] }}</a>
                                            <div class="small text-muted">Price: Rp. {{ number_format($product['price']) }} <span class="mx-2">|</span> Qty: {{ $product['quantity'] }} <span class="mx-2">|</span> Subtotal: Rp. {{ number_format($product['price'] * $product['quantity']) }}</div>
                                        </div><br>
                                    </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> Rp. {{ number_format($total) }} </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Discount</h4>
                                    <div class="ml-auto font-weight-bold"> Rp. 0 </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Tax</h4>
                                    <div class="ml-auto font-weight-bold"> Rp. 0 </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> Rp. {{ number_format($total) }} </div>
                                </div>
                                <hr> </div>
                        </div>
                        <div class="col-12 d-flex shopping-box"> <input type="submit" class="ml-auto btn hvr-hover" value="Place Order" style="color:#fff;"></div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- End Cart -->
@endsection