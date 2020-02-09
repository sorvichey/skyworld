@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">Create Tracking
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
                <form action="{{url('admin/tracking/save')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label for="waybill" class="col-sm-4 form-control-label">Way Bill<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name='waybill' id="waybill" class='form-control' value="{{old('waybill')}}" autofocus required>
                        </div>
                    </div>
                    <div class="form-group row form-control-label">
                        <label for="destination" class="col-sm-4">Destination<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="destination" id="destination" class="form-control chosen-select" required>
                                <option value="">--Select--</option>
                                @foreach($des as $destination)
                                <option value="{{$destination->id}}">{{$destination->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row form-control-label">
                        <label for="origin" class="col-sm-4">Origin<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="origin" id="origin" class="form-control chosen-select" required>
                                <option value="">--Select--</option>
                                @foreach($ori as $origin)
                                <option value="{{$origin->id}}">{{$origin->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row form-control-label">
                        <label for="status" class="col-sm-4">Status<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="status" id="status" class="form-control chosen-select" required>
                                <option value="">--Select--</option>
                                @foreach($sta as $status)
                                <option value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pcs" class="col-sm-4 form-control-label">PCS<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name='pcs' id="pcs" class='form-control' value="{{old('pcs')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dameetie" class="col-sm-4 form-control-label">Date Time<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="date" name='datetime' id="datetime" class='form-control' value="{{old('datetime')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="time" class="col-sm-4 form-control-label">Time<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name='time' id="time" class='form-control' value="{{old('time')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="receiver" class="col-sm-4 form-control-label">Receiver<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name='receiver' id="receiver" class='form-control' value="{{old('receiver')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Name" class="col-sm-4 form-control-label">&nbsp;</label>
                        <div class="col-sm-8">
                            <button type="submit" name="submit" class="btn btn-oval btn-primary"> 
                                <i class="fa fa-save "></i> Save</button>
                        </div>
                    </div>
                </form>
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