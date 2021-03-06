@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">Edit Page
                    <a href="{{url('admin/page')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
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
                <form action="{{url('admin/page/update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                   <input type="hidden" name="id" value="{{$page->id}}">
                    <div class="form-group row">
                        <label for="menu" class="col-sm-4 form-control-label">Menu <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                        <select name="menu_id" class="form-control chosen-select" id="menu_id" required>
							<option value="">-- Select --</option>
							@foreach($menus as $mid)
							<option value="{{$mid->id}}" {{$page->menu_id==$mid->id?'selected':''}}>{{$mid->name}}</option>
							@endforeach
						</select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 form-control-label">Featured Image<span class="text-danger">(1920 × 400 pixels)</span></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control"  name="featured_image" accept="image/x-png,image/gif,image/jpeg" onchange="loadFile(event)">
                            <div style="margin-top: 3px">
                                <img src="{{URL::asset($page->featured_image)}}" alt="" width="100"  id="preview">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 form-control-label">Title <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name='title' id="title" class='form-control' value="{{$page->title}}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="order" class="col-sm-4 form-control-label">Order <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="number" step="1" name='order' id="order" class='form-control' value="{{$page->order}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-4 form-control-label">Description</label>
                        <div class="col-sm-8">
                            <textarea name="description" id="description" cols="30" rows="10" class="ckeditor">{{$page->description}}</textarea>
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
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
   var roxyFileman = "{{asset('fileman/index.html?integration=ckeditor')}}"; 
</script> 
	<script>
        $(document).ready(function () {
            $("#sidebar-menu li ").removeClass("active open");
			$("#sidebar-menu li ul li").removeClass("active");
            $("#menu_page").addClass("active");
			
        });
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection