@php
    $listCategory = \App\Models\Category::all();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('theme/user/css/bootstrap.min.css') }}"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('theme/user/css/slick.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('theme/user/css/slick-theme.css') }}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('theme/user/css/nouislider.min.css') }}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('theme/user/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('theme/user/css/style.css') }}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i>{{ env('PHONE') }}</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i>{{ env('EMAIL') }}</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i>{{ env('ADDRESS') }}</a></li>
            </ul>
            <ul class="header-links pull-right">
                @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                    <li>
                        <a href="#"><i class="fa fa-user-o"></i> {{ \Illuminate\Support\Facades\Auth::guard('web')->user()->name }}</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"><i class="fa fa-user-o"></i> Logout</a>
                    </li>
                @else
                    <li><a href="{{ route('show-form-login') }}"><i class="fa fa-user-o"></i> {{ __('login') }}</a></li>
                    <li><a href="{{ route('show-form-register') }}"><i class="fa fa-user-o"></i> Register</a></li>
                @endif

            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo" style="padding-top: 5% !important;">
                        <h1 style="color: white">
                            <a href="{{ route('home') }}" style="color: white">
                                {{ env('APP_NAME') }}
                            </a>
                        </h1>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{ route('search') }}" method="get">
                            <input class="input" placeholder="Search here" name="search" value="{{ request()->get('search') ?? '' }}">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Cart -->
                        <div class="dropdown" id="cart-container">
                            @include('cart.item_cart')
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                @foreach($listCategory as $category)
                    <li><a href="{{ route('category.detail', $category->id) }}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        @error('server_error')
            <div class="alert alert-danger">
                {{ $errors->first('server_error') }}
            </div>
        @enderror
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        @yield('content')
    </div>
</div>



<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-xs-6">
                    <div class="footer text-center">
                        <h3 class="footer-title">About Us</h3>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>{{ env('ADDRESS') }}</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>{{ env('PHONE') }}</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>{{ env('EMAIL') }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> TranKimHoang <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{ asset('theme/user/js/jquery.min.js') }}"></script>
<script src="{{ asset('theme/user/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('theme/user/js/slick.min.js') }}"></script>
<script src="{{ asset('theme/user/js/nouislider.min.js') }}"></script>
<script src="{{ asset('theme/user/js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('theme/user/js/main.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.cart-dropdown').on('click', '.delete-item-cart', function () {
            let id = $(this).attr('data-id');

            $.ajax({
                url: @json(route('delete.item.cart')),
                method: 'GET',
                data: {
                    id: id
                },
                success: function (response) {
                    let data = response.data;


                    if (response.hasOwnProperty('success') && response.success === true) {
                        if (data.hasOwnProperty('qty')) {
                            $('#cart-container #cart-qty').html(data.qty);
                        }

                        if (data.hasOwnProperty('cart_dropdown')) {
                            $('#cart-container #cart-dropdown').html(data.cart_dropdown);
                        }
                    }
                }
            });
        });

        $('.add-to-cart-btn').click(function (event){
            let id = $(this).attr('data-id');

            $.ajax({
                url: @json(route('cart.add')),
                method: 'GET',
                data: {
                    product_id: id,
                    quality: $('#product-quality').val() ?? 1
                },
                success: function (response){
                    let data = response.data;

                    if( response.hasOwnProperty('success') && response.success === true){
                        if (data.hasOwnProperty('qty')) {
                            $('#cart-container #cart-qty').html(data.qty);
                        }

                        if (data.hasOwnProperty('cart_dropdown')) {
                            $('#cart-container #cart-dropdown').html(data.cart_dropdown);
                        }
                    }
                }
            })
        })
    });
</script>

@yield('js')

</body>
</html>
