@extends('layouts.front')
@section('content')
	<section class="banner-section">
		<div class="container-fluit">
			<div class="banner set-bg b2" data-setbg="{{URL::asset($contact->background)}}" style="background:no-repeat;">
			<div class="container">
            <h1 class="text-center text-brand">{{$contact->title}}</h1>
			</div>
			</div>
		</div>
	</section>
    <section class="products">
        <div class="container">
        <div class="infinite-scroll">
        <div class="row">
            @foreach($products as $p)
			<div class="col-md-3">
              <div class="card mb-4 box-shadow"><a href="{{url('drink/'.$p->id)}}">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="" style="width: 100%; display: block;" src="{{URL::asset($p->featured_image)}}" data-holder-rendered="true">
                </a>
                <div class="card-body">
                  <h6 class="card-text text-center">{{$p->name}}</h6>
                     <!-- <div class="product-price"> {{$p->price}} $</div>  -->
                </div>
              </div>
			</div>
            @endforeach
            {{$products->links()}}
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