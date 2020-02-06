@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">កែប្រែ ស្លាយរូបភាព
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
                <form action="{{url('admin/slide/update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$slide->id}}" name="id">
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 form-control-label">ចំណងជើង </label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control" id="title" name="title" value="{{$slide->title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-4 form-control-label">តម្លៃ </label>
                        <div class="col-sm-8">
                            <input type="number" step="0.1" class="form-control" id="price" name="price" value="{{$slide->price}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="short_description" class="col-sm-4 form-control-label">ការពិពណ៌នាខ្លី </label>
                        <div class="col-sm-8">
                            <textarea name="short_description" class="form-control"  id="short_description" cols="30" rows="3">{{$slide->short_description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="order" class="col-sm-4 form-control-label">លេខលំដាប់</label>
                        <div class="col-sm-8">
                            <input type="number" step="1" name='order' id="order" class='form-control' value="{{$slide->order}}">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-sm-4 form-control-label">រូបភាពស្លាយ  <span class="text-danger">(1920 × 720 pixels)</span></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="photo" accept="image/x-png,image/gif,image/jpeg" onchange="loadFile(event)">
                            <div style="margin-top: 3px">
                                <img src="{{asset($slide->photo)}}" alt="" width="200" id="preview">
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
			
            $("#menu_slide").addClass("active");
			
        });
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection