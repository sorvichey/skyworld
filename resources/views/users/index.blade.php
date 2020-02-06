@extends('layouts.app')

@section('content')
                        
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title"> All Users
                        <a href="{{url('user/create')}}"class="btn btn-primary btn-oval btn-sm mx-left"><i class="fa fa-plus-circle"></i> Create New</a>
                </p>
            </div>
        </div>
        <div class="card-block">
                <div class="table-flip-scroll">

                    <table class="table table-striped table-sm table-bordered table-hover flip-content">
                        <thead class="flip-header">
                            <tr>
                                <th>&numero;</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Photo</th>
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
                            @foreach($users as $user)
                                <tr class="odd gradeX">
                                    <td>{{$i++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role_name}}</td>
                                    <td><img src="{{URL::asset('upload/users/').'/'.$user->photo}}" width="45"/></td>
                                    <td>
                                        <a href="{{url('user/edit/'.$user->id)}}" title="កែប្រែ" class="text-success"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('user/delete/'.$user->id)}}" title="លុប" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?')" class="text-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
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
            $("#menu_user").addClass("active");
			
        })
    </script>
@endsection