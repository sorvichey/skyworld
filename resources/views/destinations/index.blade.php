@extends('layouts.app')
@section('content')                    
    <div class="card card-gray">
        <div class="card-header">
            <div class="col-sm-4">
                <div class="header-block">
                    <p class="title"> Destination <a href="{{url('admin/destination/create')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
                        <i class="fa fa-plus"></i> Create</a>
                    </p>
                    
                </div>
           </div>
        </div>
        
        <div class="card-block">
                <div class="table-flip-scroll">

                    <table class="table table-striped table-sm table-bordered table-hover flip-content">
                        <thead class="flip-header">
                            <tr>
                                <th>&numero;</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pagex = @$_GET['page'];
                            if(!$pagex)
                                $pagex = 1;
                            $i = 18 * ($pagex - 1) + 1;
                            ?>
                            @foreach($destinations as $s)
                                <tr class="odd gradeX">
                                    <td>{{$i++}}</td>
                                    <td>{{$s->name}}</td>
                                    <td>
                                        <a href="{{url('admin/destination/edit/'.$s->id)}}" title="កែប្រែ" class="text-success">
                                            <i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('admin/destination/delete/'.$s->id)}}" title="លុប" 
                                        onclick="return confirm('Are you sure to delete?')" class="text-danger">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$destinations->links()}}
                </div>
            
        </div>
    </div>
                           
@endsection

@section('js')
	<script>
        $(document).ready(function () {
            $("#sidebar-menu li ").removeClass("active open");
			$("#sidebar-menu li ul li").removeClass("active");
			
            $("#menu_setting").addClass("active open");
			$("#setting_collapse").addClass("collapse in");
            $("#destination_id").addClass("active");
        })
    </script>
@endsection