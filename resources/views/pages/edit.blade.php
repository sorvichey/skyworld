@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">កែប្រែ ទំព័រ
                    <a href="{{url('admin/page')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
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
                <form action="{{url('admin/page/update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                   <input type="hidden" name="id" value="{{$page->id}}">
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 form-control-label">ឈ្មោះ <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title" value="{{$page->title}}" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="description" class="col-sm-4 form-control-label">បរិយាយ</label>
                        <div class="col-sm-8">
                            <textarea name="description" id="description" cols="30" rows="10" class="ckeditor">{{$page->description}}</textarea>
                        </div>
                    </div>
                     
                    <div class="form-group row">
                        <label class="col-sm-4 form-control-label">រូបភាពផ្ទៃខាងក្រោយទំព័រ<span class="text-danger">(1920 × 400 pixels)</span></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control"  name="background" accept="image/x-png,image/gif,image/jpeg" onchange="loadFile(event)">
                            <div style="margin-top: 3px">
                                <img src="{{URL::asset($page->background)}}" alt="" width="100"  id="preview">
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
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">បង្កើត ការបរិយាយបន្តែមក្នុងទំព័រ
                </p>
            </div>
        </div>
        
        <div class="card-block">
            <div class="col-md-9">
                @if(Session::has('sms2'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div>
                            {{session('sms2')}}
                        </div>
                    </div>
                @endif
                @if(Session::has('sms3'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div>
                            {{session('sms3')}}
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
                <form action="{{url('admin/sub-page/save')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$page->id}}" name="page_id">
                    <div class="form-group row">
                        <label for="order" class="col-sm-4 form-control-label">លេខលំដាប់ </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="order" value="1" name="order">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="featured_image" class="col-sm-4 form-control-label">រូបភាពដំណាង</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="featured_image" accept="image/x-png,image/gif,image/jpeg" onchange="loadFile(event)">
                            <div style="margin-top: 3px">
                                <img src="" alt="" width="100"  id="preview">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="youtube" class="col-sm-4 form-control-label">Youtube Embed លីង  <span class="text-danger">បញ្ចាក់ : បើសិនជាមានរូបតំណាងសូមកំដាក់ Youtube</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="youtube" name="youtube">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="sub_description" class="col-sm-4 form-control-label">បរិយាយ</label>
                        <div class="col-sm-8">
                            <textarea name="sub_description" id="sub_description" cols="30" rows="10" class="ckeditor"></textarea>
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
            <div class="card-block">
                <div class="table-flip-scroll">
              
                    <table class="table table-striped table-sm table-bordered table-hover flip-content">
                        <thead class="flip-header">
                            <tr>
                                <th>ល.រ</th>
                                <th>រូបភាពដំណាង</th> 
                                <th>YouTube</th>
                                <th>លេខលំដាប់</th>
                                <th>សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pagex = @$_GET['page'];
                            if(!$pagex)
                                $pagex = 1;
                            $i = 18 * ($pagex - 1) + 1;
                            ?>
                            @foreach($sub_pages as $s)
                                <tr class="odd gradeX">
                                    <td>{{$i++}}</td>
                                    <td><img src="{{URL::asset($s->featured_image)}}" width="60"/></td>
                                    <td> <iframe width="150" height="40" src="{{$s->youtube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                                  
                                    <td>{{$s->order}}</td>
                                    <td>
                                        <a href="{{url('admin/sub-page/edit/'.$s->id.'?page_id='.$page->id)}}" title="កែប្រែ" class="text-success">
                                            <i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('admin/sub-page/delete/'.$s->id.'?page_id='.$page->id)}}" title="លុប" 
                                        onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')" class="text-danger">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$sub_pages->links()}}
                </div>
            
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