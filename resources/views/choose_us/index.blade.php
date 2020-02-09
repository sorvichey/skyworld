@extends('layouts.app')
@section('content')                    
    <div class="card card-gray">
        <div class="card-header">
            <div class="col-sm-4">
                <div class="header-block">
                    <p class="title"> Choose Us <a href="{{url('admin/choose_us/create')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
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
                                <th>Description</th>
                                <th>Imange Feature</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pagex = @$_GET['page'];
                            if(!$pagex)
                                $pagex = 1;
                            $i = 18 * ($pagex - 1) + 1;
                            ?>
                            @foreach($choose_us as $s)
                                <tr class="odd gradeX">
                                    <td>{{$i++}}</td>
                                    <td>{{$s->description}}</td>
                                    <td><img src="{{URL::asset($s->featured_image)}}" width="45"/></td>
                                    <td>
                                        <a href="{{url('admin/choose_us/edit/'.$s->id)}}" title="កែប្រែ" class="text-success">
                                            <i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('admin/choose_us/delete/'.$s->id)}}" title="លុប" 
                                        onclick="return confirm('Are you sure to delete?')" class="text-danger">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$choose_us->links()}}
                </div>
            
        </div>
    </div>
                           
@endsection

@section('js')
	<script>
        $(document).ready(function () {
            $("#sidebar-menu li ").removeClass("active open");
			$("#sidebar-menu li ul li").removeClass("active");
            $("#menu_choose_us").addClass("active");
        })
    </script>
@endsection