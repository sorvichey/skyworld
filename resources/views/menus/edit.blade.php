@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">Edit Menu
                    <a href="{{url('admin/menu')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
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
                <form action="{{url('admin/menu/update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                   <input type="hidden" name="id" value="{{$menu->id}}">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 form-control-label">Name <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value="{{$menu->name}}" required>
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
</script> 
	<script>
        $(document).ready(function () {
            $("#sidebar-menu li ").removeClass("active open");
			$("#sidebar-menu li ul li").removeClass("active");
            $("#menu_page").addClass("active");
			
        });
    </script>
@endsection