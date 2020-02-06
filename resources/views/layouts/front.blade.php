<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>CHATOKI Café</title>
	<meta charset="UTF-8">
	<meta name="description" content=" CHATOKI Café">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('fronts/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('fronts/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('fronts/css/flaticon.css')}}"/>
	<link rel="stylesheet" href="{{asset('fronts/css/slicknav.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('fronts/css/jquery-ui.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('fronts/css/owl.carousel.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('fronts/css/animate.css')}}"/>
	<link rel="stylesheet" href="{{asset('fronts/css/style.css')}}"/>
</head>
<body>
	<?php $socials = DB::table('socials')->where('active', 1)->orderBy('order')->get();?>
	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="{{url('/')}}" class="site-logo">
							<img src="{{asset('fronts/img/logo.jpg')}}" width="100" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5 mt-4 text-center">
								<a href="#" target="_blank"><img src="{{asset('fronts/img/cambodia.png')}}" width="40"></a>
								<a href="#" target="_blank"><img src="{{asset('fronts/img/japan.png')}}" width="40"></a>
								<a href="#" target="_blank"><img src="{{asset('fronts/img/united-states.png')}}" width="40"></a>
					</div>
					<div class="col-xl-4 col-lg-5  mt-4">
						<div class="user-panel">
							<div class="up-item">
							</div>
							<div class="up-item">
								@foreach($socials as $social)
									<a href="{{url($social->url)}}" target="_blank"><img src="{{asset($social->icon)}}" width="40"></a>
								@endforeach
								<!-- <a href="#" target="_blank"><img src="{{asset('fronts/img/cambodia.png')}}" width="40"></a>
								<a href="#" target="_blank"><img src="{{asset('fronts/img/japan.png')}}" width="40"></a>
								<a href="#" target="_blank"><img src="{{asset('fronts/img/united-states.png')}}" width="40"></a> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="{{url('/')}}"> <i class="fa fa-home"></i> Home</a></li>
					<li><a href="{{url('drink')}}">Drink</a></li>
					<li><a href="{{url('shop')}}">Shop</a></li>
					<li><a href="{{url('about-us')}}">About Us</a></li>
					<li><a href="{{url('contact-us')}}">Contact Us</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->

    @yield('content')

		<div class="social-links-warp">
			<div class="container">
				<div class="text-center">
					@foreach($socials as $social)
                    <a href="{{url($social->url)}}" target="_blank"><img src="{{asset($social->icon)}}" width="40"></a>
					@endforeach
				</div> 
				<p class="text-center">Copyright &copy; <script>document.write(new Date().getFullYear());</script> Chatoki</p>
			</div>
		</div>

	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('fronts/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('fronts/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('fronts/js/jquery.slicknav.min.js')}}"></script>
	<script src="{{asset('fronts/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('fronts/js/jquery.nicescroll.min.js')}}"></script>
	<script src="{{asset('fronts/js/jquery.zoom.min.js')}}"></script>
	<script src="{{asset('fronts/js/jquery-ui.min.js')}}"></script>
	<script src="{{asset('fronts/js/main.js')}}"></script>
	@yield('js')
	</body>
</html>
