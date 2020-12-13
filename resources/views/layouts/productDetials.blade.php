<?php
$sizes = explode(',', $product->productDetail->size);
$colors = explode(',', $product->productDetail->color);
$orderDetails=App\OrderDetails::all();
?>
@extends('layouts.app_front')
@section('content')
<body>


    <!-- Header Section Begin -->
   @include('layouts.partial.header')
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{route('shop')}}"> Shop</a>
                        <span>Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-widget">
                        <h4 class="fw-title">Category</h4>
                        <ul class="filter-catagories">
                            <li><a href="#">{{(isset($product->category->parentCategory))?$product->category->parentCategory->name:$product->category->name}}</a></li>
                            <?php
                                if (isset($product->category->parentCategory)) {
                                    $categories = $product->category->parentCategory;
                                } else {
                                    $categories = $product->category;
                                }

                            ?>
                            @foreach($categories->childrenCategory as $category)
                            <li><a href="{{route('category.product',$category->id)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <!-- <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                        <select class="select form-control" name="color">
                            <option value="">- Please Select -</option>
                            @foreach($colors as $color)
                            <option value="{{$color}}">{{$color}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                        <select class="select form-control" name="color">
                            <option value="">- Please Select -</option>
                            @foreach($sizes as $size)
                            <option value="{{$size}}">{{$size}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div> -->

                </div>
                <div class="col-lg-9">
                    <div class="row">
                    <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{$product->productImages[0]->image}}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                <?php $i = 0;?>
                                @foreach($product->productImages as $image)
                                    <div class="pt {{($i == 0)? 'active' : ''}}" data-imgbigurl="{{asset($image->image)}}"><img
                                            src="{{asset($image->image)}}" alt=""></div>
                                    <?php $i++;?>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{$product->category->name}}</span>
                               <h3>{{$product->name}}</h3></a>
                                </div>
                                <div class="pd-rating">
                                <?php
                                    $rated = floor($product->rating->average('rating'));
                                    $unrated = 5-$rated;
                                    while($rated > 0){
                                        echo('<a class="fa fa-star" style="font-size: 20px;color: #ffd119 !important;margin:5px 2.5px"></a>');
                                        $rated--;
                                    }
                                    while($unrated > 0){
                                        echo('<a class="fa fa-star-o" style="font-size: 20px;color: #ffd119 !important;margin:5px 2.5px"></a>');
                                        $unrated--;
                                    }

                                ?>
                                        <span>{{$product->rating->count('rating')}} Ratting (S)</span>
                                </div>
                                <div class="pd-desc">
                                    <p>{{$product->description}}</p>
                                    <h4>{{$product->price}} &#2547; <span>{{$product->price  +20}}&#2547;</span></h4>
                                </div>
                             <form action="{{route('add.cart', $product->id)}}" method="post">
                                @csrf
                                <div class="pd-color">
                                    <h6>Color</h6>
                                  <div class="pd-color-choose">
                                        <select class="select form-control" name="color">
                                        <option value="">- Please Select -</option>
                                        @foreach($colors as $color)
                                        <option value="{{$color}}">{{$color}}</option>
                                        @endforeach
                                    </select>
                                   </div>
                                </div>
                                <div class="pd-color">
                                <h6>Size:</h6>
                                <div class="pd-color-choose">
                                    <select class="select form-control" name="size">
                                    <option value="">- Please Select -</option>
                                    @foreach($sizes as $size)
                                    <option value="{{$size}}">{{$size}}</option>
                                    @endforeach
                                </select>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" name="quantity">
                                    </div>
                                    <input type="submit" class="primary-btn pd-cart" value="Add To Cart">
                                </div>
                            </form>
                                <ul class="pd-tags">
                                    <li style="text-transform:capitalize;"><span>CATEGORIES</span >: {{isset($product->category->parentCategory)?$product->category->parentCategory->name . " ->":''}} {{$product->category->name}}</li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>Introduction</h5>
                                                <p>{{$product->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">{{$product->price}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock">{{$product->quantity}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">{{$product->productDetail->size}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td><p>{{$product->productDetail->color}}</p></td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">{{$product->productDetail->model}}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>Comments</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="" alt="">
                                                </div>
                                            @if(isset($product->rating))
                                              @foreach($product->rating as $rating)
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                    <?php
                                                                $rated = $rating->rating;
                                                                $unrated = 5-$rated;
                                                                while($rated > 0){
                                                                    echo('<span class="fa fa-star" style="font-size: 20px;color: #ffd119 !important;margin:5px 2.5px"></span>');
                                                                    $rated--;
                                                                }
                                                                while($unrated > 0){
                                                                    echo('<span class="fa fa-star-o" style="font-size: 20px;color: #ffd119 !important;margin:5px 2.5px"></span>');
                                                                    $unrated--;
                                                                }

                                                    ?>
                                                    </div>
                                                    <h5>{{$rating->orderDetails->order->user->name}}<span>{{$rating->created_at->diffForHumans()}}</span></h5>
                                                    <div class="at-reply">{{$rating->feedback}}</div>
                                                </div>
                                               @endforeach
                                            @endif
                                            </div>
                                        </div>
                                         <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages"></textarea>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <!-- <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-1.jpg" alt="">
                            <div class="sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Coat</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $14.00
                                <span>$35.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-2.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Shoes</div>
                            <a href="#">
                                <h5>Guangzhou sweater</h5>
                            </a>
                            <div class="product-price">
                                $13.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-3.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-4.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Converse Shoes</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Related Products Section End -->

    <!-- Partner Logo Section Begin -->
    <!-- <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
@include('layouts.partial.footer')
    <!-- Footer Section End -->

@endsection