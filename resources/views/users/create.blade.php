@extends('layouts.app')

@section('content')

<div class="card card-gray">
	<div class="card-header">
		<div class="header-block">
			<p class="title"> Create User 
				<a href="{{url('user')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> <i class="fa fa-mail-reply"></i> Back</a>
			</p>
		</div>
	</div>
	<div class="card-block">
		<div class="card card-block sameheight-item" >
			
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
				<form action="{{url('user/save')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group row">
						<label for="Name" class="col-sm-4 form-control-label">Name <span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input type="name" class="form-control" id="Name" name="name" placeholder="Name" value="{{old('name')}}" required autofocus>
						</div>
					</div>
					<div class="form-group row">
						<label for="Email" class="col-sm-4 form-control-label">Email <span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="Email" name="email" placeholder="Email" value="{{old('email')}}" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="Role" class="col-sm-4 form-control-label">Role <span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<select name="role_id" class="form-control chosen-select" id="Role" required>
								<option value="">-- Select --</option>
								@foreach($roles as $role)
								<option value="{{$role->id}}">{{$role->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="photo" class="col-sm-4 form-control-label">Photo </label>
						<div class="col-sm-8">
							<input type="file" id="photo" name="photo" >
						</div>
					</div>
					<div class="form-group row">
						<label for="Password" class="col-sm-4 form-control-label">Password <span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input type="password" class="form-control" id="Password" name="password" placeholder="Password" value="{{old('password')}}" required>
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
</div>

@endsection
