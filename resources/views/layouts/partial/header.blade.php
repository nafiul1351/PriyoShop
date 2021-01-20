@php
    $cart = \Cart::getContent();
    $brands=App\Brand::all();
@endphp
<header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        <a href="mailto:nafiul1351@gmail.com" class="ahead">nafiul1351@gmail.com</a>
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        <a href="tel:+8801992775545" class="ahead">+8801992775545</a>
                    </div>
                </div>
                <div class="ht-right">
                    <a href="{{route('login')}}" class="login-panel"><i class="fa fa-user"></i>My Account</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="{{asset('img/flag-1.jpg')}}" data-imagecss="flag yt"
                                data-title="English">English</option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <form action="{{route('search.result')}}" method="get" class="form-group">
                            <div class="advanced-search">
                                <button type="button" onclick="location.href='{{route('shop')}}';" class="category-btn">All Products</button>

                                @csrf
                                <div class="input-group">
                                    <input type="text" name="name" placeholder="What do you need?">
                                    <button type="submit" name="submit"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a> 
                            </li>
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>{{$cart->count()}}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @foreach($cart as $c)
                                                @php $product = \App\Product::find($c->id) @endphp
                                                <tr>
                                                    <td class="si-pic"><img style="width:120px;height:80px" src="{{asset($product->productImages[0]->image)}}"  alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>{{$c->price}} x {{$c->quantity}}</p>
                                                            <h6 style="front-size:16px">{{$product->name}}</h6>
                                                        </div>
                                                    </td>
                                             <div class="cart-delete">
                                                        <form id="cart-delete-form" action="{{ route('cart.remove',$c->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <td class="si-close">
                                                                <button type="submit"><i
                                                                class="ti-close"></i></button>
                                                          </td>
                                                        </form>
                                             </div>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>{{\Cart::getTotal()}}</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="{{route('show.cart')}}" class="primary-btn view-card">VIEW CART</a>
                                        <a href="{{url('user/checkout')}}/na/na" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">{{\Cart::getTotal()}} BDT</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">

                        @foreach($categories as $category)
                            <li class="active"><a href="{{route('category.product',$category->id)}}">{{$category->name}}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ '/' == request()->path() ? 'active' : '' }}"><a href="{{url('/')}}">Home</a></li>
                        <li class="{{ request()->segment(1) == 'shop' ? 'active' : '' }}"><a href="{{route('shop')}}">Shop</a></li>
                        <li class="{{ request()->segment(1) == 'brand' ? 'active' : '' }}"><a href="">Brand</a>
                            <ul class="dropdown">
                                @foreach($brands as $brand)
                                <li><a href="{{route('brand.product',$brand->id)}}">{{$brand->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="{{ request()->segment(1) == 'contact' ? 'active' : '' }}"><a href="{{route('contact')}}">Contact</a></li>
                        <li class="{{ request()->segment(1) == 'aboutus' ? 'active' : '' }}"><a href="{{route('aboutus')}}">About Us</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
