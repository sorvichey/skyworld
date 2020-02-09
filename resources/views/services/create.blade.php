@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">Create Service
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
                <form action="{{url('admin/service/save')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group row">
                        <label for="title" class="col-sm-4 form-control-label">Title <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-4 form-control-label">Icon <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" required name="icon" accept="image/x-png,image/gif,image/jpeg" onchange="loadFile(event)" required>
                            <div style="margin-top: 3px">
                                <img src="" alt="" width="100"  id="preview">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="order" class="col-sm-4 form-control-label">Order</label>
                        <div class="col-sm-8">
                            <input type="number" step="1" class="form-control" id="order" name="order" value="{{old('order')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="short_description" class="col-sm-4 form-control-label">Short Description</label>
                        <div class="col-sm-8">
                            <textarea name="short_description" id="short_description" cols="45" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-4 form-control-label">Description</label>
                        <div class="col-sm-8">
                            <textarea name="description" id="description" cols="30" rows="10" class="ckeditor"></textarea>
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
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
   var roxyFileman = "{{asset('fileman/index.html?integration=ckeditor')}}"; 

  CKEDITOR.replace( 'description',{filebrowserBrowseUrl:roxyFileman, 
                               filebrowserImageBrowseUrl:roxyFileman+'&type=image',
                               removeDialogTabs: 'link:upload;image:upload'});
</script> 
	<script>
        $(document).ready(function () {
            $("#sidebar-menu li ").removeClass("active open");
			$("#sidebar-menu li ul li").removeClass("active");
            $("#menu_service").addClass("active");
			
        });
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection