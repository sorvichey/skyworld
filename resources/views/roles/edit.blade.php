@extends('layouts.app')

@section('content')
                        
									<div class="card card-gray">
										<div class="card-header">
											<div class="header-block">
												<p class="title"> កែប្រែ តួនាទីអ្នកប្រើប្រាស់
													<a href="{{url('role')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> <i class="fa fa-mail-reply"></i> ត្រលប់ក្រោយ</a>
													<a href="{{url('role/create')}}" class="btn btn-primary btn-oval btn-sm mx-left"><i class="fa fa-plus-circle"></i> បង្កើតថ្មី</a>
												</p>
											</div>
										</div>
										<div class="card-block">
                                            
											
                                                <div class="col-md-6">
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
                                                    <form action="{{url('role/update')}}" method="POST">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="id" value="{{$roles->id}}">
                                                        <div class="form-group row">
                                                            <label for="Name" class="col-sm-4 form-control-label">ឈ្មោះ <span class="text-danger">*</span></label>
                                                            <div class="col-sm-8">
                                                                <input type="name" class="form-control" id="Name" name="name" placeholder="Name" value="{{$roles->name}}" required autofocus>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="Name" class="col-sm-4 form-control-label">&nbsp;</label>
                                                            <div class="col-sm-8">
                                                                <button type="submit" name="submit" class="btn btn-oval btn-primary"> <i class="fa fa-save "></i> បញ្ជូន</button>
                                                            </div>
                                                        </div>
                                                    </form>
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

