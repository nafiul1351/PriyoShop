<footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="{{url('/')}}"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Mirpur, Dhaka, Bangladesh</li>
                            <li>Phone: <a href="tel:+8801992775545" class="afoot">+8801992775545</a></li>
                            <li>Email: <a href="mailto:nafiul1351@gmail.com" class="afoot">nafiul1351@gmail.com</a></li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="{{route('aboutus')}}">About Us</a></li>
                            
                            <li><a href="{{route('contact')}}">Contact</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="{{route('login')}}">My Account</a></li>
                            
                            <li><a href="{{route('shop')}}">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class=" text-center" style="color:#fff;">
                            Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | {{ config('app.name', 'Laravel') }}
                            <p>This site is designed and developed by <a href="https://www.mdnafiulislam.com/">Md. Nafiul Islam</a></p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </footer>