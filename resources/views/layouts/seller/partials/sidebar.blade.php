<aside>
    <div id="sidebar" class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
        <p class="centered">
            <a href="{{route('seller.home')}}">
                <i class="fa fa-user-circle img-circle" aria-hidden="true" style="font-size:60px"></i>
            </a>
        </p>
        <h5 class="centered">{{Auth::user()->name ?? 'Guest'}}</h5>
        <li class="mt">
            <a href="{{route('seller.home')}}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sub-menu">
          <a href="javascript:;">
            <i class="fa fa-desktop"></i>
            <span>Shop Management</span>
            </a>
          <ul class="sub">
            <li><a href="{{ route('shop.request') }}">All Shop</a></li>
          </ul>
        </li>

        <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Category</span>
              </a>
            <ul class="sub">
              <li><a href="{{ route('category.all') }}">All Category</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Brand</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('add.band')}}">All Brand</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Product</span>
              </a>
            <ul class="sub">
              <li><a href="{{ route('product.all') }}">All Product</a></li>
              <li><a href="{{ route('product.add') }}">Add Product</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Order</span>
              </a>
            <ul class="sub">
              <li><a href="{{route('seller.showOrders')}}">All Order</a></li>
            </ul>
          </li>


      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>
