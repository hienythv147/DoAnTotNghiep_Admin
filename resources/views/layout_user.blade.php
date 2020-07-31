<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Site Metas -->
    <title>Cafe SP</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="right-phone-box">
                        <p>Gọi cho chúng tôi :<a href="#"> 037-380-1132</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="fas fa-location-arrow"></i> Vị Trí</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Liện hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
                    <div class="our-link">
                        <ul>
                             <!-- Authentication Links -->
                            @guest
                                <li><a href="{{ Route('login') }}">Đăng Nhập</a></li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->last_name . ' ' . Auth::user()->first_name  }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" style="color: black"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Đăng xuất
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                            
                        </ul>
                    </div>
					</div>
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Giảm giá 20% khi nhập mã: offT80
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Giảm giá 50% - 80% cho thức ăn nhanh
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Cà phê - Giảm giá 10%!
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Thực đơn - Giảm giá 50%!
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Thức uống - Giảm giá 10%!
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Giảm giá 50% - 80% cho thức ăn nhanh
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Giảm giá 20% khi nhập mã: offT30
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Thực đơn - Giảm giá 50%!
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="{{ Route('home') }}"><img style="width: 100px;height:100px" src="{{ asset('assets/images/logo.png') }}" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item {{ Request::path() == 'products' ? 'active' : ''}}"><a class="nav-link" href="{{ Route('products') }}">ĐẶT HÀNG</a></li>
                        <li class="nav-item {{ Request::path() == 'categories' ? 'active' : ''}}"><a class="nav-link" href="{{ Route('categories') }}">THỰC ĐƠN</a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::path() == 'about' ? 'active' : ''}}" href="{{ Route('about') }}">LIÊN HỆ</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                @guest
                <div class="attr-nav">
                        <ul>
                            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                @else
                    <div class="attr-nav">
                        <ul>
                            <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                            <li class="side-menu">
                                <a href="#">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span class="badge" style="color: red" id="cart_amount">{{ empty(Session::get('cart', null)) ? '' : count(Session::get('cart', null)) }}</span>
                                    <p>GIỎ HÀNG</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endguest
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            @auth
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list" id="cart-box">
                        <p style="display: none">{{$total = 0}}<p>
                        @if(!empty(Session('cart')))
                        @foreach(Session('cart') as $item)
                        <li>
                            @if(!empty($item['image']))
                            <a href="#" class="photo"><img src="{{ asset('assets/images/products_image/'.$item['image']) }}" class="cart-thumb" alt="" /></a>
                            @else
                            <a href="#" class="photo"><img src="{{ asset('assets/images/not_found.png') }}" class="cart-thumb" alt="" /></a>
                            @endif
                            <h6><a href="#">{{$item['name']}} </a></h6>
                            <p>{{$item['amount']}}x - <span class="price">{{$item['price']}} VNĐ</span></p>
                        </li>
                        <p style="display: none">{{$total += $item['price'] * $item['amount']}}<p>  
                        @endforeach
                        @endif
                        <li class="total">
                            <a href="{{ Route('cart') }}" class="btn btn-default hvr-hover btn-cart">Xem</a>
                            <span class="float-right"><strong>Total</strong>: <b>{{ $total }}</b> VNĐ</span>
                        </li>
                    </ul>
                </li>
                @endauth
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Body -->
    @if($flash = session('message_success'))
    <div id="flash-message" class="alert alert-success alert-dismissible fade show" role="alert">
        {{$flash }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if($flash = session('message_error'))
    <div id="flash-message" class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$flash}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @yield('body')
    <!-- End Body -->

    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Thời Gian Làm Việc</h3>
							<ul class="list-time">
								<li>Thứ 2 - Thứ 6: 08.00 đến 17.00</li> <li>Thứ 7: 10.00 đến 20.00pm</li> <li>Chủ Nhật: <span>Đóng cửa</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Hộp Thư</h3>
							<form class="newsletter-box">
								<div class="form-group">
									<input class="" type="email" name="Email" placeholder="Địa chỉ email" />
									<i class="fa fa-envelope"></i>
								</div>
								<button class="btn hvr-hover" type="button">Gửi</button>
							</form>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Mạng Xã Hội</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
						</div>
					</div>
				</div>
				<hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>Freshshop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> 
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> 							
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Thông tin</h4>
                            <ul>
                                <li><a href="#">Dịch Vụ Khách Hàng</a></li>
                                <li><a href="#">Vị Trí</a></li>
                                <li><a href="#">Điều Khoản &amp; Điều Kiện</a></li>
                                <li><a href="#">Chính Sách Bảo Mật</a></li>
                                <li><a href="#">Thông Tin Giao Hàng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Thông Tin Liên Hệ</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Địa Chỉ: 157 Dương Bá Trạc<br>Phường 1, Quận 8 TP HCM</p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>SĐT: <a href="tel:+84373801132">037-380-1132</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2020 <a href="#">ThewayShop</a>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="padding-top: 15px; display: none; ">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/js/inewsticker.js') }}"></script>
    <script src="{{ asset('assets/js/bootsnav.js') }}"></script>
    <script src="{{ asset('assets/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>
</body>

</html>