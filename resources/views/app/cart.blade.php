@extends('layouts.app')

@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Carts</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('products') }}">Products</a></li>
                    <li class="breadcrumb-item active">Cart</li>
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
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $total = 0 @endphp
                        @if(session('cart'))
                            @foreach (session('cart') as $id => $product)
                                @php $total += $product['price'] * $product['quantity'] @endphp
                            <tr>
                                <td class="thumbnail-img">
                                    <img class="img-fluid" src="{{ route('products.image', ['imageName' => $product['image_url']]) }}" alt="" />
                                </td>
                                <td class="name-pr">
                                    <p>{{ $product['name'] }}</p>
                                </td>
                                <td class="price-pr">
                                    <p>Rp. {{ number_format($product['price']) }}</p>
                                </td>
                                <td class="quantity-box">
                                    <input type="hidden" value="{{ $product['quantity'] }}" class="quantity">
                                    <input type="number" id="quantity" value="{{ $product['quantity'] }}" class="c-input-text quantity">
                                </td>
                                <td class="total-pr">
                                    <p>Rp. {{ number_format($product['price'] * $product['quantity']) }}</p>
                                </td>
                                <td class="remove-pr">
                                    <a href="#">
                                        <button class="remove-from-cart" data-id="{{ $id }}"><i class="fas fa-times"></i></button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row my-8">
            <div class="col-lg-12">
                <div class="update-box">
                @if(session('cart'))
                    @foreach (session('cart') as $id => $product)
                    <button class="update-cart" data-id="{{ $id }}" style="border-radius: 50px">Update</button>
                    @endforeach
                @endif
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Order summary</h3>
                    <div class="d-flex">
                        <h4>Sub Total</h4>
                        <div class="ml-auto font-weight-bold"> Rp. {{ number_format($total) }} </div>
                    </div>
                    <div class="d-flex">
                        <h4>Discount</h4>
                        <div class="ml-auto font-weight-bold"> Rp. 0 </div>
                    </div>
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
                    <div class="col-12 d-flex shopping-box">
                        <a href="{{ route('checkout.index') }}" class="ml-auto btn hvr-hover">Checkout</a> 
                    </div>
                    <div class="col-lg-8 col-sm-12"></div>


                </div>
            </div>
            
        </div>
        
    </div>
</div>
<!-- End Cart -->
@endsection