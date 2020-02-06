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
        <div class="container">
           {!!$contact->description!!}
        </div>
	</section>
    @endsection