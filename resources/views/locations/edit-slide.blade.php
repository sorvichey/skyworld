@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">កែប្រែ អាសយដ្ឋាន
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
                <form action="{{url('admin/location/update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                   <input type="hidden" value="{{$location->id}}" name="id">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 form-control-label">ឈ្មោះ <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value="{{$location->name}}" required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="address" class="col-sm-4 form-control-label">អាសយដ្ឋាន <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name='address' id="address" class='form-control' required value="{{$location->address}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-4 form-control-label">លេខទូរស័ព្ទ <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name='phone' id="phone" class='form-control' required value="{{$location->phone}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="google_map" class="col-sm-4 form-control-label">Google Map លីង <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name='google_map' id="google_map" class='form-control' value="{{$location->google_map}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 form-control-label">រូបភាពហាង <span class="text-danger">(750 × 500 pixels)</span></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="featured_image" accept="image/x-png,image/gif,image/jpeg" onchange="loadFile(event)">
                            <div style="margin-top: 3px">
                                <img src="{{URL::asset($location->featured_image)}}" alt="" width="100"  id="preview">
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
                <p class="title">កែប្រែ រូបហាង
                  
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
                <form action="{{url('admin/location-slide/update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$location->id}}" name="location_id">
                    <input type="hidden" value="{{$location_slide->id}}" name="id">
                    <div class="form-group row">
                        <label for="photo" class="col-sm-4 form-control-label">រូបភាពហាង <span class="text-danger">(750 × 500 pixels)</span></label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="photo" accept="image/x-png,image/gif,image/jpeg" onchange="loadFile(event)">
                            <div style="margin-top: 3px">
                                <img src="{{URL::asset($location_slide->photo)}}" alt="" width="100"  id="preview">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="order" class="col-sm-4 form-control-label">លេខលំដាប់ <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="number" step="1" min="1" class="form-control" id="order" name="order" value="{{$location_slide->order}}" required>
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
                <?php $location_slides = DB::table('location_slides')->orderBy('id', 'desc')->where('active', 1)->where('location_id', $location->id)->paginate(18);?>
                    <table class="table table-striped table-sm table-bordered table-hover flip-content">
                        <thead class="flip-header">
                            <tr>
                                <th>ល.រ</th>
                                <th>រូបភាពហាង</th> 
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
                            @foreach($location_slides as $s)
                                <tr class="odd gradeX">
                                    <td>{{$i++}}</td>
                                    <td><img src="{{URL::asset($s->photo)}}" width="60"/></td>
                                    <td>{{$s->order}}</td>
                                    <td>
                                        <a href="{{url('admin/location-slide/edit/'.$s->id.'?location_id='.$location->id)}}" title="កែប្រែ" class="text-success">
                                            <i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('admin/location-slide/delete/'.$s->id.'?location_id='.$location->id)}}" title="លុប" 
                                        onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')" class="text-danger">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$location_slides->links()}}
                </div>
            
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