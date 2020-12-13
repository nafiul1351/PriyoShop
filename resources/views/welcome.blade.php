@extends('layouts.app_front')
@section('content')
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
  @include('layouts.partial.header')
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                        <h2>Women’s</h2>
                        <a href="/category/all-product/3">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        
                    </div>
                    <div class="product-slider owl-carousel">
         @foreach($products as $product)
        @if((isset($product->category->parentCategory) && strtolower($product->category->parentCategory->name) == "women") || (strtolower($product->category->name) == 'women'))            
                        <div class="product-item">
                            <div class="pi-pic">
                            <a href="{{route('product.details',$product->id)}}">   <img src="{{$product->productImages[0]->image}}" alt="" height="300px"></a>
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
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
        @endif
        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week set-bg spad" data-setbg="img/time-bg.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                        consectetur adipisicing elit </p>
                    <div class="product-price">
                        $35.00
                        <span>/ HanBag</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="#" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        
                    </div>
                    <div class="product-slider owl-carousel">
        @foreach($products as $product)
        @if((isset($product->category->parentCategory) && strtolower($product->category->parentCategory->name) == "men") || (strtolower($product->category->name) == 'men'))
                        <div class="product-item">
                            <div class="pi-pic">
                            <a href="{{route('product.details',$product->id)}}">          <img src="{{asset($product->productImages[0]->image)}}" alt="" height="300px"></a>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{$product->category->name}}</div>
                                <a href="{{route('product.details',$product->id)}}">
                                    <h5>{{$product->name}}</h5>
                                </a>
                                <div class="product-price">
                                    {{$product->price}} &#2547;
                                </div>
                            </div>
                        </div>
        @endif
        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="img/products/man-large.jpg">
                        <h2>Men’s</h2>
                        <a href="/category/all-product/2">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Partner Logo Section Begin -->
    @include('layouts.partial.brand')
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    @include('layouts.partial.footer')
@endsection