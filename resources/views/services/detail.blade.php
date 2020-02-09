@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">Detail Service
                    <a href="{{url('admin/service')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
                        <i class="fa fa-mail-reply"></i> Back</a>
                </p>
            </div>
        </div>
        
        <div class="card-block">
            <div class="col-md-9">
                @if(Session::has('sms'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div>
                            {{session('sms')}}
                        </div>
                    </div>
                @endif
                @if(Session::has('sms1'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div>
                            {{session('sms1')}}
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                   <div class="form-group row">
                        <label for="title" class="col-sm-4 form-control-label">Title </label>
                        <div class="col-sm-8">
                            : {{$service->title}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 form-control-label">Icon</label>
                        <div class="col-sm-8">
                            <div style="margin-top: 3px">
                                : <img src="{{asset($service->icon)}}" class="img-responsive" alt="" width="200">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="order" class="col-sm-4 form-control-label">Order </label>
                        <div class="col-sm-8">
                            : {{$service->order}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="short_description" class="col-sm-4 form-control-label">Short Description</label>
                        <div class="col-sm-8">
                            : {!!$service->short_description!!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-4 form-control-label">Description</label>
                        <div class="col-sm-8">
                            : {!!$service->description!!}
                        </div>
                    </div>   
            </div>
        </div>
    </div>
                
@endsection

@section('js')
	<script>
        $(document).ready(function () {
            $("#sidebar-menu li ").removeClass("active open");
			$("#sidebar-menu li ul li").removeClass("active");
            $("#menu_service").addClass("active");
			
        });
    </script>
@endsection