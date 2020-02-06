@extends('layouts.front')
@section('content')
	<section class="banner-section">
		<div class="container-fluit">
			<div class="banner set-bg b2" data-setbg="{{URL::asset($about->background)}}" style="background:no-repeat;">
			<div class="container">
            <h1 class="text-center text-brand">{{$about->title}}</h1>
			</div>
			</div>
		</div>
        <div class="container">
           {!!$about->description!!}
        </div>
	</section>
    <section class="banner-section">
		<?php $sub_pages = DB::table('sub_pages')->orderBy('order', 'asc')->where('active', 1)->where('page_id', $about->id)->get(); ?>
        <div class="container">
          <div class="row">
          <div class=" col-md-12 border-b"></div>
          @foreach($sub_pages as $s)
            <div class="col-md-5 p-3">
                @if(@$s->featured_image != null)
                <img src="{{URL::asset($s->featured_image)}}" alt="">
                @else 
                <iframe width="100%" height="315" src="{{$s->youtube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @endif
            </div>
            <div class="col-md-7 p-3">
            {!!$s->description!!}
            </div>
            <div class="col-md-12 border-b"></div>
            @endforeach
          </div>
        </div>
	</section>
    @endsection