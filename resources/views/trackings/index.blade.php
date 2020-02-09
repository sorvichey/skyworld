@extends('layouts.app')
@section('content')                    
    <div class="card card-gray">
        <div class="card-header">
            <div class="col-sm-4">
                <div class="header-block">
                    <p class="title"> Tracking <a href="{{url('admin/tracking/create')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
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
                                <th>Way bill</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>Datetime</th>
                                <th>Status</th>
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
                            @foreach($trackings as $s)
                                <tr class="odd gradeX">
                                    <td>{{$i++}}</td>
                                    <td>
                                <a href="{{url('admin/tracking/detail/'.$s->id)}}">
                                    {{$s->waybill}}
                                </a>
                            </td>
                                    <th>{{$s->oname}}</th>
                                    <th>{{$s->dname}}</th>
                                    <th>{{$s->datetime}}</th>
                                    <th>{{$s->sname}}</th>
                                    <td>
                                        <a href="{{url('admin/tracking/edit/'.$s->id)}}" title="កែប្រែ" class="text-success">
                                            <i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('admin/tracking/delete/'.$s->id)}}" title="លុប" 
                                        onclick="return confirm('Are you sure to delete?')" class="text-danger">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$trackings->links()}}
                </div>
            
        </div>
    </div>
                           
@endsection

@section('js')
	<script>
        $(document).ready(function () {
            $("#sidebar-menu li ").removeClass("active open");
			$("#sidebar-menu li ul li").removeClass("active");
            $("#menu_tracking").addClass("active");
        })
    </script>
@endsection