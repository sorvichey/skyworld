@extends('layouts.app')
@section('content')                    
    <div class="card card-gray">
        <div class="card-header">
            <div class="col-sm-4">
                <div class="header-block">
                    <p class="title"> Service  <a href="{{url('admin/service/create')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
                        <i class="fa fa-plus"></i> Create</a>
                    </p>
                    
                </div>
           </div>
        </div>
        
        <div class="card-block">
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
                <div class="table-flip-scroll">

                    <table class="table table-striped table-sm table-bordered table-hover flip-content">
                        <thead class="flip-header">
                            <tr>
                                <th>&numero;</th>
                                <th>Title</th>
                                <th>Icon</th>
                                <th>Order</th>
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
                            @foreach($services as $s)
                                <tr class="odd gradeX">
                                    <td>{{$i++}}</td>
                                    <td>
                                        <a href="{{url('admin/service/detail'.$s->id)}}"></a>
                                        {{$s->title}}
                                    </td>
                                    <td><img src="{{URL::asset($s->icon)}}" width="60"/></td>
                                    <td>{{$s->order}}</td>
                    
                                    <td>
                                        <a href="{{url('admin/service/edit/'.$s->id)}}" title="Edit" class="text-success">
                                            <i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('admin/service/delete/'.$s->id)}}" title="Delete" 
                                        onclick="return confirm('Do you want to delete?')" class="text-danger">
                                            <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$services->links()}}
                </div>
            
        </div>
    </div>
                           
@endsection

@section('js')
	<script>
        $(document).ready(function () {
            $("#sidebar-menu li ").removeClass("active open");
			$("#sidebar-menu li ul li").removeClass("active");
            $("#menu_service").addClass("active");
        })
    </script>
@endsection