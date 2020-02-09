@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">Edit Slide
                    <a href="{{url('admin/slide')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
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
                <form action="{{url('admin/slide/update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$slide->id}}" name="id">
                    <div class="form-group row">
                        <label for="menu" class="col-sm-4 form-control-label">Menu</label>
                        <div class="col-sm-8">
                        <select name="menu_id" class="form-control chosen-select" id="menu_id" required>
							<option value="">-- Select --</option>
							@foreach($menus as $mid)
							<option value="{{$mid->id}}" {{$slide->menu_id==$mid->id?'selected':''}}>{{$mid->name}}</option>
							@endforeach
						</select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="order" class="col-sm-4 form-control-label">Order</label>
                        <div class="col-sm-8">
                            <input type="number" step="1" name='order' id="order" class='form-control' value="{{$slide->order}}">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-sm-4 form-control-label">Featured Image  <span class="text-danger">(1920 × 720 pixels)</span></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="featured_image" accept="image/x-png,image/gif,image/jpeg" onchange="loadFile(event)">
                            <div style="margin-top: 3px">
                                <img src="{{asset($slide->featured_image)}}" alt="" width="200" id="preview">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Name" class="col-sm-4 form-control-label">&nbsp;</label>
                        <div class="col-sm-8">
                            <button type="submit" name="submit" class="btn btn-oval btn-primary"> 
                                <i class="fa fa-save "></i> Save Change</button>
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
			
            $("#menu_slide").addClass("active");
			
        });
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection