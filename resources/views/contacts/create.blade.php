@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">Create Contact
                    <a href="{{url('admin/contact')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
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
                <form action="{{url('admin/contact/save')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label for="address" class="col-sm-4 form-control-label">Address</label>
                        <div class="col-sm-8">
                            <input type="text" name='address' id="address" class='form-control' value="{{old('address')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tel1" class="col-sm-4 form-control-label">Tel 1<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tel1" name="tel1" value="{{old('tel1')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tel2" class="col-sm-4 form-control-label">Tel 2</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tel2" name="tel2" value="{{old('tel2')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 form-control-label">Email 1<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email1" name="email1" value="{{old('email1')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email2" class="col-sm-4 form-control-label">Email 2</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="email2" name="email2" value="{{old('email2')}}">
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
			
            $("#menu_contact").addClass("active");
			
        });
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection