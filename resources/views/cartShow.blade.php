@extends('layouts.app_front')
@section('content')
@include('layouts.partial.header')
<div class="cart-main-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="cart-heading">Cart</h1>
                <div class="table-content table-responsive">
                    @if(isset($products) && !$products->isEmpty())
                    <table>
                        <thead>
                            <tr>
                                <th>Remove</th>
                                <th>Images</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                @csrf
                                <td class="si-close">
                                    <form  action="{{ route('cart.remove',$product->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')       
                                           <button style="padding:0px;margin:0;background:transparent;border:none;cursor:pointer" type="submit"><i
                                            class="ti-close"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('product.details',$product->id)}}">
                                        <img src="{{$product->productImages[0]->image}}" alt=""
                                            style="max-width:70px;max-height:70px">
                                      </a>
                                </td>
                                <td style="width:10%;"><a href="">{{$product->name}}</a></td>
                                <td ><span>{{$product->price}} BDT</span></td>
                                <form action="{{route('cart.update',$product->id)}}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <td class="product-quantity">
                                        <input style="width:40%" value="{{$product->quantity}}" type="number" min="1" name="quantity">
                                    </td>
                                    <td class="product-subtotal">{{$product->subTotal}} BDT</td>
                                    <td>
                                        <input class="button bg-dark" name="update_cart" value="Update" type="submit"
                                            style="width:100%; color:white">
                                </td>
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-danger">Please add product to cart!</div>
                    @endif
                </div>
                <div class="card" style="width: 18rem; margin:80px; float:right;">
                     <div class="card-body">
                            <h4 class="card-title text-center" style="font-weight:bold">Cart Totals</h54>
                            <hr>
                            <p class="card-text">{{"Total :"}} {{$cart['subTotal']}} BDT</p>
                            <p class="card-text"></p>
                            <a href="{{url('user/checkout')}}/na/na" class="btn bg-dark text-white">Proceed to checkout</a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.partial.footer')

@endsection

@section('script')
<script>
    function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition,showError);
            } else {
                $('.geo-alert').html('Please alow location otherwise we will not be able to provide you to distance');
            }
        }
        function showPosition(position) {
            document.getElementById("checkout").href="{{url('user/checkout')}}"+"/"+position.coords.latitude+"/"+position.coords.longitude;
        }
        function showError(error) {
            var x = $('.geo-alert');
            switch(error.code) {
                case error.PERMISSION_DENIED:
                x.html('<div class="alert alert-danger">Please alow location otherwise we will not be able to detect your address automatically</div>');
                break;
                case error.POSITION_UNAVAILABLE:
                x.html('<div class="alert alert-danger">Location information is unavailable.</div>');
                break;
                case error.TIMEOUT:
                x.html('<div class="alert alert-danger">The request to get user location timed out.</div>');
                break;
                case error.UNKNOWN_ERROR:
                x.html('<div class="alert alert-danger">An unknown error occurred.</div>');
                break;
            }
        }
        (function() {
            getLocation();

        })();

</script>
@endsection

