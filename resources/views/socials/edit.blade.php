@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">Edit Social
                    <a href="{{url('admin/social')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
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
                <form action="{{url('admin/social/update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$social->id}}" name="id">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 form-control-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" step="1" name='name' id="name" class='form-control' value="{{$social->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url" class="col-sm-4 form-control-label">Url<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="url" name="url" value="{{$social->url}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 form-control-label">Icon</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="icon" accept="image/x-png,image/gif,image/jpeg" onchange="loadFile(event)">
                            <div style="margin-top: 3px">
                                <img src="{{asset($social->icon)}}" alt="" width="60" id="preview">
                            </div>
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
			
            $("#menu_social").addClass("active");
			
        });
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection