<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicons -->
    <link href="{{ asset('_include_admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('_include_admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css
">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('_include_admin/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('_include_admin/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('_include_admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('_include_admin/css/style-responsive.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        @include('layouts.user.partials.header')
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        @include('layouts.user.partials.sidebar')
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <div class="row mt">
                    <div class="col-lg-12">
                        @include('layouts.flashMessages')
                        @yield('content')
                    </div>
                </div>
            </section>
            <!-- /wrapper -->
        </section>
        <!-- /MAIN CONTENT -->
        <!--main content end-->
        <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                <p>
                    &copy; Copyrights <strong>{{ config('app.name', 'Laravel') }}</strong>. All Rights Reserved
                </p>
                <a href="blank.html#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('_include_admin/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('_include_admin/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('_include_admin/lib/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ asset('_include_admin/lib/jquery.ui.touch-punch.min.js') }}"></script>
    <script class="{{ asset('_include_admin/include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js') }}">
    </script>
    <script src="{{ asset('_include_admin/lib/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('_include_admin/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <!--common script for all pages-->
    <script src="{{ asset('_include_admin/lib/common-scripts.js') }}"></script>
    <!--script for this page-->
    <script>
        jQuery(document).ready(function(){
            var height = jQuery(document).height()-jQuery('#header').outerHeight()-jQuery('.site-footer').outerHeight();
            jQuery('.content').css('min-height',height+'px');
        });
        jQuery(document).resize(function(){
            var height = jQuery(document).height()-jQuery('#header').outerHeight()-jQuery('.site-footer').outerHeight();
            jQuery('.content').css('min-height',height+'px');
        });
    </script>
    @yield('script')
</body>

</html>
