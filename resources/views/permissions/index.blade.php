@extends('layouts.app')
@section('content')
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
            <p class="title"> 
                កំណត់សិទ្ធិសម្រាប់ [{{$role->name}}] 
                <a href="{{url('role')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> <i class="fa fa-mail-reply"></i> ត្រលប់ក្រោយ</a>
            </p>
            </div>
        </div>
        <div class="card-block">
            @csrf
            <div class="table-flip-scroll">
                <table class="table table-striped table-sm table-bordered table-hover flip-content">
                    <thead>
                        <tr>
                            <th>ល.រ</th>
                            <th>ឈ្មោះមុខងារ</th>
                            <th>មើល</th>
                            <th>បញ្ចូល</th>
                            <th>កែប្រែ</th>
                            <th>លុប</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($per_role as $per)
                            <tr role-id="{{$role_id}}" permission-id="{{$per->permission_id}}" id="{{$per->id==''?'0':$per->id}}">
                                <td>{{$i++}}</td>
                                <td>{{$per->alias}}</td>
                                <td>
                                    <label class="switch switch-3d switch-primary">
                                        <input type='checkbox' value="{{$per->list?'1':'0'}}" {{$per->list==1?'checked':''}} onchange="save(this)" class="switch-input">
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                    </label>

                                </td>
                                <td>
                                    <label class="switch switch-3d switch-primary">
                                        <input type='checkbox' value="{{$per->insert?'1':'0'}}" {{$per->insert==1?'checked':''}} onchange="save(this)" class="switch-input">
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                    </label>

                                </td>
                                <td>
                                    <label class="switch switch-3d switch-primary">
                                        <input type='checkbox' value="{{$per->update?'1':'0'}}" {{$per->update==1?'checked':''}} onchange="save(this)" class="switch-input">
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                    </label>

                                </td>
                                <td>
                                    <label class="switch switch-3d switch-primary">
                                        <input type='checkbox' value="{{$per->delete?'1':'0'}}" {{$per->delete==1?'checked':''}} onchange="save(this)" class="switch-input">
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                    </label>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/role_permission.js')}}"></script>
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