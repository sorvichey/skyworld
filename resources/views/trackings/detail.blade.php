@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">Detail Tracking
                    <a href="{{url('admin/tracking')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
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
                    <label for="waybill" class="col-sm-4 form-control-label">Bill Way</label>
                    <div class="col-sm-8">
                        : {{$tracking->waybill}}
                    </div>
                </div>
                <div class="form-group row form-control-label">
                    <label for="destination" class="col-sm-4">Destination</label>
                    <div class="col-sm-8">
                    : {{$tracking->dname}}
                    </div>
                </div>
                <div class="form-group row form-control-label">
                    <label for="origin" class="col-sm-4">Origin</label>
                    <div class="col-sm-8">
                    : {{$tracking->oname}}
                    </div>
                </div>
                <div class="form-group row form-control-label">
                    <label for="status" class="col-sm-4">Status</label>
                    <div class="col-sm-8">
                    : {{$tracking->sname}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pcs" class="col-sm-4 form-control-label">PCS</label>
                    <div class="col-sm-8">
                        : {{$tracking->pcs}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dameetie" class="col-sm-4 form-control-label">Date Time</label>
                    <div class="col-sm-8">
                        : {{$tracking->datetime}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="time" class="col-sm-4 form-control-label">Time</label>
                    <div class="col-sm-8">
                        : {{$tracking->time}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="receiver" class="col-sm-4 form-control-label">Receiver</label>
                    <div class="col-sm-8">
                        : {{$tracking->receiver}}
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
            $("#menu_tracking").addClass("active");
        });
    </script>
@endsection