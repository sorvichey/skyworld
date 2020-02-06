@extends('layouts.app')

@section('content')

<div class="card card-gray">
	<div class="card-header">
		<div class="header-block">
			<p class="title"> Update User 
				<a href="{{url('user')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> <i class="fa fa-mail-reply"></i> Back</a>
				<a href="{{url('user/create')}}" class="btn btn-primary btn-oval btn-sm mx-left"><i class="fa fa-plus-circle"></i> Create New</a>
			</p>
		</div>
	</div>
	
	<div class="card-block" >
		<div class="col-md-8">
			
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
			<form action="{{url('user/update')}}" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}
				<input type="hidden" name="id" value="{{$users->id}}">
				<div class="form-group row">
					<label for="Name" class="col-sm-4 form-control-label">Name <span class="text-danger">*</span></label>
					<div class="col-sm-8">
						<input type="name" class="form-control" id="Name" name="name" placeholder="Name" value="{{$users->name}}" required autofocus>
					</div>
				</div>
				<div class="form-group row">
					<label for="Email" class="col-sm-4 form-control-label">Email <span class="text-danger">*</span></label>
					<div class="col-sm-8">
						<input type="email" class="form-control" id="Email" name="email" placeholder="Email" value="{{$users->email}}" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="Role" class="col-sm-4 form-control-label">Role <span class="text-danger">*</span></label>
					<div class="col-sm-8">
						<select name="role_id" class="form-control chosen-select" id="Role" required>
							<option value="">-- Select --</option>
							@foreach($roles as $role)
							<option value="{{$role->id}}" {{$users->role_id==$role->id?'selected':''}}>{{$role->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="photo" class="col-sm-4 form-control-label">Photo </label>
					<div class="col-sm-8">
						<input type="file" id="photo" name="photo" >
						<img src="{{URL::asset('upload/users/').'/'.$users->photo}}" width="60"/>
						<input type="hidden" name="old_photo" value="{{$users->photo}}">
					</div>
				</div>
				<div class="form-group row">
					<label for="Password" class="col-sm-4 form-control-label">New Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control" id="Password" name="password" placeholder="New Password" value="{{old('password')}}">
					</div>
				</div>
				
				<div class="form-group row">
					<label for="Name" class="col-sm-4 form-control-label">&nbsp;</label>
					<div class="col-sm-8">
						<button type="submit" name="submit" class="btn btn-oval btn-primary"> <i class="fa fa-save "></i> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
