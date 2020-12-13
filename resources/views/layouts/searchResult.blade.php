<?php
 $brands=App\Brand::all();
?>
@extends('layouts.app_front')
@section('content')

    <!-- Header Section Begin -->
    @include('layouts.partial.header')
    <!-- Header End -->
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Search-wise</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                        @foreach($categories as $category)
                            <li><a href="{{route('category.product',$category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    
                    
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div>
                        </div>
                    </div> -->
                    <div class="product-list">
                        <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                       <a href="{{route('product.details',$product->id)}}"> <img src="{{$product->productImages[0]->image}}" alt="" height="220px" width="100px"></a>
                                        <div class="sale pp-sale">Sale</div>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{$product->category->name}}</div>
                                        <a href="{{route('product.details',$product->id)}}">
                                            <h5>{{$product->name}}</h5>
                                        </a>
                                        <div class="product-price">
                                        {{$product->price}} &#2547;
                                            <span>{{$product->price +20}} &#2547;</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">
                            Loading More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Partner Logo Section Begin -->
    @include('layouts.partial.brand')
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
   @include('layouts.partial.footer')
@endsection
@section('script')
<script>
    var sliderrange = $('#price-slider-range');
    var amountprice = $('#price-amount');
    var amount_input = $('#amount');
$(function() {
    sliderrange.slider({
        range: true,
        min: parseInt('{{$price["min"] ?? "20"}}'),
        max: parseInt('{{$price["max"] ?? "5000"}}'),
        values: [parseInt('{{$searchPrice["min"] ?? "0"}}'), parseInt('{{$searchPrice["max"] ?? $price["max"]}}')],
        slide: function(event, ui) {
            amountprice.html("("+ui.values[0] + " - " + ui.values[1] + ") BDT");
            amount_input.val(ui.values[0] + "," + ui.values[1]);

        }
    });
    amountprice.html("("+sliderrange.slider("values", 0) +' - '+ sliderrange.slider("values", 1) + ") BDT");
    amount_input.val(sliderrange.slider("values", 0) +','+ sliderrange.slider("values", 1));

});
</script>
@endsection