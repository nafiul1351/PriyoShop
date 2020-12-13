<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered">
                <a href="{{route('admin.home')}}">
                    <i class="fa fa-user-circle img-circle" aria-hidden="true" style="font-size:60px"></i>
                </a>
            </p>
            <h5 class="centered">{{Auth::user()->name ?? 'Guest'}}</h5>
            <li class="mt">
                <a href="{{route('admin.home')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-tasks"></i>
                    <span>Slider Management</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('add.slider')}}">Slider</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-tasks"></i>
                    <span>Seller Management</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('seller.requests')}}">Seller Requests</a></li>
                    <li><a href="{{route('seller.approvedSellers')}}">Approved Sellers</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-tasks"></i>
                    <span>Shop Management</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('shop.requests')}}">Shop Requests</a></li>
                    <li><a href="{{route('shop.approvedShops')}}">Approved Shops</a></li>
                </ul>
            </li>

            
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
