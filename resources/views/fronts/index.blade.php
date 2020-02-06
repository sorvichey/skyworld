@extends('layouts.front')
@section('content')
<!-- Hero section -->
<?php $slides = DB::table('slides')->where('active', 1)->orderBy('order', 'asc')->get();?>
<section class="hero-section">
		<div class="hero-slider owl-carousel">
			@foreach($slides as $sli)
			<div class="hs-item set-bg" data-setbg="{{URL::asset($sli->photo)}}">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>{{$sli->title}}</h2>
							<p>{!!$sli->short_description!!}</p>
						</div>
					</div>
					@if($sli->price != null)
					<div class="offer-card text-white">
						<span>from</span>
						<!-- <h2>{{$sli->price}} $</h2> -->
						<p>SHOP NOW</p>
					</div>
					@endif
				</div>
			</div>
			@endforeach
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
  <section class="benefit">
		<div class="container">
				<div class="row">
					<div class="col-md-6">
					<iframe width="100%" height="315" src="{{$benefit->youtube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<div class="col-md-6 text-white">
					<p class="font-size-big">	<b>	{{$benefit->title}}</b></p>	
					{!!$benefit->description!!}
					</div>
				</div>
		</div>
	</section>



	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>LATEST PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
			@foreach($products as $p)
				<div class="product-item">
					<div class="pi-pic">
					@if($p->status != null)
					<div class="tag-new">New</div>
					@endif
						<img src="{{URL::asset($p->featured_image)}}" alt="">
					</div>
					<div class="pi-text">
						<!-- <h6>{{$p->price}} $</h6> -->
						<p>{{$p->name}} </p>
					</div>
				</div>
				@endforeach
			
			</div>
		</div>
	</section>
	<section class="banner-section">
		<div class="container-fluit">
			<div class="banner set-bg" data-setbg="{{asset('fronts/img/b1.jpg')}}">
			<div class="container">
				<div class="tag-new"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-half-o" aria-hidden="true"></i></div>
				<span>About CHATOKI <i class="fa fa-smile-o" aria-hidden="true"></i></span>
				<aside class="text-light mb-3">
				CHATOKI is a handcrafted drink shop which is focusing on Japanese Green Tea as our main ingredient of our menus by serving Japanese Taste and Quality.
				</aside>
				<a href="{{url('about-us')}}" class="site-btn">Read More</a>
			</div>
			</div>
		</div>
	</section>
	<section class="section-news">
		<div class="container mb-5">
			<h3 class="text-white text-center mt-4">Videos</h1><br>
			<div class="row">
			@foreach($videos as $v)
						<div class="col-md-4">
              <div class="card mb-4 box-shadow">
							<iframe width="100%" height="230" src="{{$v->youtube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="card-body">
                  <p class="card-text">{{$v->title}}</p>
                </div>
              </div>
					</div>
			@endforeach
			
			
			</div>
		</div>
	</section>
    @endsection