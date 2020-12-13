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
                        <a href="{{route('shop')}}"><i class="fa fa-home"></i> Shop</a>
                        <span>Category-wise</span>
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
                        @foreach($categories as $cat)
                            <li><a href="{{route('category.product',$cat->id)}}">{{$cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    
                    
                    
                    <!-- <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                        <select class="select form-control" name="color">
                            <option value="">- Please Select -</option>
                            <option value="">{{"Black"}}</option>
                            <option value="">{{"White"}}</option>
                            <option value="">{{"Blue"}}</option>
                            <option value="">{{"Red"}}</option>
                            <option value="">{{"Green"}}</option>
                            <option value="">{{"Yellow"}}</option>
                        </select>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                        <select class="select form-control" name="color">
                            <option value="">- Please Select -</option>
                            <option value="">{{"sm"}}</option>
                            <option value="">{{"large"}}</option>                          <option value="">{{"xl"}}</option>
                            <option value="">{{"xxl"}}</option>
                        </select> 
                        </div>
                    </div> -->
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
                        @foreach($category->product as $product)            
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                       <a href="{{route('product.details',$product->id)
                                       }}"> <img src="{{$product->productImages[0]->image}}" alt="" height="220px" width="100px"></a>
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