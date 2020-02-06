@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">បង្កើត អាសយដ្ឋាន
                    <a href="{{url('admin/location')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
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
                <form action="{{url('admin/location/save')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                   
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 form-control-label">ឈ្មោះ <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="address" class="col-sm-4 form-control-label">អាសយដ្ឋាន <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name='address' id="address" class='form-control' required value="{{old('address')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-4 form-control-label">លេខទូរស័ព្ទ <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name='phone' id="phone" class='form-control' required value="{{old('address')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="google_map" class="col-sm-4 form-control-label">Google Map លីង <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name='google_map' id="google_map" class='form-control' value="{{old('address')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 form-control-label">រូបភាពហាង <span class="text-danger">(750 × 500 pixels)</span></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" required name="featured_image" accept="image/x-png,image/gif,image/jpeg" onchange="loadFile(event)">
                            <div style="margin-top: 3px">
                                <img src="" alt="" width="100"  id="preview">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Name" class="col-sm-4 form-control-label">&nbsp;</label>
                        <div class="col-sm-8">
                            <button type="submit" name="submit" class="btn btn-oval btn-primary"> 
                                <i class="fa fa-save "></i> រក្សាទុក</button>
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
			
            $("#menu_location").addClass("active");
			
        });
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection