@extends('layouts.front')
@section('content')
	<section class="banner-section">
		<div class="container-fluit">
			<div class="banner set-bg b2" data-setbg="{{URL::asset($shop->background)}}" style="background:no-repeat;">
			<div class="container">
            <h1 class="text-center text-brand">{{$shop->title}}</h1>
			</div>
			</div>
		</div>
    </section>
    <?php $i = 1; $j = 0;
     $shop_slides= DB::table('location_slides')
     ->where('active', 1)
     ->where('location_id', $cshop->id)
     ->orderBy('order', 'asc')
     ->get();
    ?>
    <section class="products">
        <div class="container">
            <div class="infinite-scroll">
                <div class="row">
                    <div class="col-md-5">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                    @foreach($shop_slides as $s)
                    @if($j++ == 0)
                    <li data-target="#demo" data-slide-to="{{$j}}" class="active"></li>
                    @else
                    <li data-target="#demo" data-slide-to="{{$j}}"></li>
                    @endif
                    @endforeach     
                    </ul> 
                    <div class="carousel-inner">
                    @foreach($shop_slides as $s)
                    <!-- The slideshow -->
                    @if($i++ == 1)
                        <div class="carousel-item active">
                            <img src="{{URL::asset($s->photo)}}" alt="">
                        </div>
                    @else 
                    <div class="carousel-item">
                        <img src="{{URL::asset($s->photo)}}" alt="">
                    </div>
                    @endif
                    @endforeach
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    </a>
                    </div>
                    </div>
                    <div class="col-md-7">
                        <p class="name-shop-detail"><img src="{{url('fronts/img/small-logo.png')}}" alt="">
                        {{$cshop->name}}</p>
                        <p><i class="fa fa-phone text-success"></i> {{$cshop->phone}}</p>
                        <p><i class="fa fa-map-marker text-success"></i>  {{$cshop->address}}</p>
                    </div>
                    
                </div>
              
            </div>
        </div>
    </section>
    <div class="col-md-12 p-0">
                        @if($cshop->google_map != null)
                        <iframe src="{{$cshop->google_map}}" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                        @endif
                    </div>
    @endsection
   