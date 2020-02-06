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
    <section class="products">
        <div class="container">
        <div class="infinite-scroll">
        <div class="row">
            @foreach($shops as $p)
			<div class="col-md-4">
              <div class="card  mb-4 box-shadow">
                  <a href="{{url('shop/'.$p->id)}}">
               <img alt="" style="width: 100%; display: block;" src="{{URL::asset($p->featured_image)}}" data-holder-rendered="true">
               </a> <a href="{{url('shop/'.$p->id)}}"  title="Look Detail"> 
               <p class="detail-shop">
              <i class="text-white fa fa-eye"></i>
</p></a>
               <div class="card-body"> <a href="{{url('shop/'.$p->id)}}"><p class="text-center shop-text">
                <img src="{{url('fronts/img/small-logo.png')}}" alt=""></p></a>
                <a href="{{url('shop/'.$p->id)}}"><p class="card-text text-center name-shop">{{$p->name}}</p></a>
                <a href="{{url('shop/'.$p->id)}}">  <p class="shop-text"><i class="fa fa-phone text-success"></i> {{$p->phone}}</p></a>
                <a href="{{url('shop/'.$p->id)}}">  <p class="shop-text"><i class="fa fa-map-marker text-success"></i>  {{$p->address}}</p></a>
                </div>
              </div>
			</div>
            @endforeach
            {{$shops->links()}}
            </div>
        </div>
        </div>
    </section>
    @endsection
    @section('js')
<script src="{{asset('fronts/js/jscroll-master/dist/jquery.jscroll.min.js')}}"></script>
    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="{{asset('fronts/img/loading.gif')}}" alt="Loading..." />',
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>
@endsection