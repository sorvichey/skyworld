@extends('layouts.app')
@section('content')                    
    <div class="card card-gray">
        <div class="card-header">
            <div class="col-sm-4">
                <div class="header-block">
                    <p class="title"> Contact <a href="{{url('admin/contact/create')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
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
                                <th>Address</th>
                                <th>Tel 1</th>
                                <th>Tel 2</th>
                                <th>Email1</th>
                                <th>Email2</th>
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
                            @foreach($contacts as $s)
                                <tr class="odd gradeX">
                                    <td>{{$i++}}</td>
                                    <td>{{$s->address}}</td>
                                    <td>{{$s->tel1}}</td>
                                    <td>{{$s->tel2}}</td>
                                    <td>{{$s->email1}}</td>
                                    <td>{{$s->email2}}</td>
                                    <td>
                                        <a href="{{url('admin/contact/edit/'.$s->id)}}" title="កែប្រែ" class="text-success">
                                            <i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('admin/contact/delete/'.$s->id)}}" title="លុប" 
                                        onclick="return confirm('Are you sure to delete?')" class="text-danger">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$contacts->links()}}
                </div>
            
        </div>
    </div>
                           
@endsection

@section('js')
	<script>
        $(document).ready(function () {
            $("#sidebar-menu li ").removeClass("active open");
			$("#sidebar-menu li ul li").removeClass("active");
            $("#menu_contact").addClass("active");
        })
    </script>
@endsection