@extends('layouts.front')
@section('content') 
    <section class="products">
        <div class="container">
        <div class="row">
			<div class="col-md-3">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{URL::asset($p->featured_image)}}">
                <div class="card-body">
                  <h6 class="card-text text-center">{{$p->name}}</h6>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection