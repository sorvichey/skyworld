@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">បង្កើត ស្លាយរូបភាព
                    <a href="{{url('admin/slide')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
                        <i class="fa fa-mail-reply"></i> ត្រលប់ក្រោយ</a>
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
                <form action="{{url('admin/slide/save')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group row">
                        <label for="menu_id" class="col-sm-4 form-control-label">Menu </label>
                        <div class="col-sm-8">
                        <select name="menu_id" class="form-control chosen-select" id="menu_id" required>
								<option value="">-- Select --</option>
								@foreach($menus as $m)
								<option value="{{$m->id}}">{{$m->name}}</option>
								@endforeach
							</select>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label for="order" class="col-sm-4 form-control-label">Order</label>
                        <div class="col-sm-8">
                            <input type="number" step="1" name='order' id="order" class='form-control' value="{{old('order')}}">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-sm-4 form-control-label">Featured Image  <span class="text-danger">(1920 × 720 pixels)</span></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="featured_image" accept="image/x-png,image/gif,image/jpeg" onchange="loadFile(event)" required>
                            <div style="margin-top: 3px">
                                <img src="{{asset('fronts/slides/default.png')}}" alt="" width="200" id="preview">
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
			
            $("#menu_slide").addClass("active");
			
        });
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection