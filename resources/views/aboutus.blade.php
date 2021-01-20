@extends('layouts.app_front')
@section('content')
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

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
                        <span>About Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Contact Section3 Begin -->
    <section class="contact-section3 spad">
        <div class="container">
            <div class="row">
                <p style="padding-top: 10px; padding-left: 15px;">PriyoShop is an online shopping mall for buying and selling clothes. It's payment methods are totally secure. Both Buyers and sellers can be benefited by using this website.</p>
                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Owner</h4>
                        
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-user"></i>
                            </div>
                            <div class="ci-text">
                                <span>Name:</span>
                                <p>Md. Nafiul Islam</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Phone:</span>
                                <p><a href="tel:+8801992775545" class="ahead">+8801992775545</a></p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Email:</span>
                                <p><a href="mailto:nafiul1351@gmail.com" class="ahead">nafiul1351@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Contact Section3 End -->

    <!-- Partner Logo Section Begin -->
    @include('layouts.partial.brand')
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    @include('layouts.partial.footer')
    <!-- Footer Section End -->
@endsection
