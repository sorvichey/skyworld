@extends('layouts.app')
@section('content')                    
    <div class="card card-gray">
        <div class="card-header">
            <div class="col-sm-4">
                <div class="header-block">
                    <p class="title">បណ្តាញសង្គមទាំងអស់  <a href="{{url('admin/social/create')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
                        <i class="fa fa-plus"></i> បង្កើត</a>
                    </p>
                    
                </div>
           </div>
        </div>
        
        <div class="card-block">
                <div class="table-flip-scroll">

                    <table class="table table-striped table-sm table-bordered table-hover flip-content">
                        <thead class="flip-header">
                            <tr>
                                <th>ល.រ</th>
                                <th>រូបតំណាង</th>
                                <th>link ចូលទៅកាន់បណ្តាញសង្គម</th>
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
                            @foreach($socials as $s)
                                <tr class="odd gradeX">
                                    <td>{{$i++}}</td>
                                    <td><img src="{{URL::asset($s->icon)}}" width="60"/></td>
                                    <td>{{$s->url}}</td>
                                    <td>{{$s->order}}</td>
                                    <td>
                                        <a href="{{url('admin/social/edit/'.$s->id)}}" title="កែប្រែ" class="text-success">
                                            <i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('admin/social/delete/'.$s->id)}}" title="លុប" 
                                        onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')" class="text-danger">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$socials->links()}}
                </div>
            
        </div>
    </div>
                           
@endsection

@section('js')
	<script>
        $(document).ready(function () {
            $("#sidebar-menu li ").removeClass("active open");
			$("#sidebar-menu li ul li").removeClass("active");
            $("#menu_social").addClass("active");
        })
    </script>
@endsection