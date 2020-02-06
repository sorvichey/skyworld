@extends('layouts.app')

@section('content')
                       
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">  តួនាទីអ្នកប្រើប្រាស់  
                    <a href="{{url('role/create')}}" class="btn btn-primary btn-oval btn-sm mx-left"><i class="fa fa-plus-circle"></i> បង្កើតថ្មី</a>
                </p>
            </div>
        </div>
        
        <div class="card-block">
                <div class="table-flip-scroll">

                    <table class="table table-striped table-sm table-bordered table-hover flip-content">
                        <thead class="flip-header">
                            <tr>
                                <th>ល.រ</th>
                                <th>ឈ្មោះ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pagex = @$_GET['page'];
                            if(!$pagex)
                                $pagex = 1;
                            $i = 18 * ($pagex - 1) + 1;
                            ?>
                            @foreach($roles as $role)
                                <tr class="odd gradeX">
                                    <td>{{$i++}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <a href="{{url('role/permission/'.$role->id)}}" title="កំណត់សិទ្ធិ" class="text-warning"><i class="fa fa-key"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('role/edit/'.$role->id)}}" title="កែប្រែ" class="text-success"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('role/delete/'.$role->id)}}" title="លុប" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')" class="text-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$roles->links()}}
                </div>
            
        </div>
    </div>
                           
@endsection

@section('js')
	<script>
        $(document).ready(function () {
            $("#sidebar-menu li ").removeClass("active open");
			$("#sidebar-menu li ul li").removeClass("active");
			
            $("#menu_security").addClass("active open");
			$("#security_collapse").addClass("collapse in");
            $("#role_id").addClass("active");
			
        })
    </script>
@endsection