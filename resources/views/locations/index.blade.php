@extends('layouts.app')
@section('content')                    
    <div class="card card-gray">
        <div class="card-header">
            <div class="col-sm-4">
                <div class="header-block">
                    <p class="title"> អាសយដ្ឋានទាំងអស់  <a href="{{url('admin/location/create')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
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
                                <th>ឈ្មោះ</th> 
                                <th>លេខទូរស័ព្ទ</th>
                                <th>អាសយដ្ឋាន</th>
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
                            @foreach($locations as $s)
                                <tr class="odd gradeX">
                                    <td>{{$i++}}</td>
                                    <td>{{$s->name}}</td>
                                    <td> <a href="{{url('admin/location/edit/'.$s->id)}}" title="មើលលំអិត និង កែប្រែ" class="text-success">{{$s->address}}</a></td>
                                    <td>{{$s->phone}}</td>
                                    <td>
                                        <a href="{{url('admin/location/edit/'.$s->id)}}" title="កែប្រែ" class="text-success">
                                            <i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('admin/location/delete/'.$s->id)}}" title="លុប" 
                                        onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')" class="text-danger">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$locations->links()}}
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
        })
    </script>
@endsection