@extends('layouts.master')

@section('content')
	
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<i class="fa fa-edit"></i> Edit	Users
				</div>
 
				<form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<div class="card-block">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}

					<div class="form-group row">
						<label for="name" class="col-md-3 form-control-label">Name:</label>
						<div class="col-md-9">
							<input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}">

							@if($errors->has('name'))
								<div class="text-danger">{{ $errors->first('name') }}</div>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-md-3 form-control-label">Email:</label>
						<div class="col-md-9">
							<input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">

							@if($errors->has('email'))
								<div class="text-danger">{{ $errors->first('email') }}</div>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="role" class="form-control-label col-md-3">Role:</label>
						<div class="col-md-9">
							<select name="role" id="role" type="text" class="form-control">
								<option selected disabled>_____Please Choose Role_____</option>
{{-- 								@foreach($roles as $id => $role)
									<option value="{{ $id }}" {{ ($id == $user_role)? 'selected' : '' }}>
										{{ $role }}
									</option>
								@endforeach --}}
									@foreach($roles as $id => $role)
									<option value="{{ $id }}" {{ ($id == $user_role)? 'selected' : '' }}>
										{{ $role }}
									</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label for="password" class="col-md-3 form-control-label">Password:</label>
						<div class="col-md-9">
							<input type="password" id="password" name="password" class="form-control">
						
							@if($errors->has('password'))
								<div class="text-danger">{{ $errors->first('password') }}</div>
							@endif
						</div>	
					</div>
					
					<div class="form-group row">
						<label for="password_confirmation" class="col-md-3 form-control-label">Confirm Password</label>
						<div class="col-md-9">
							<input type="password" id="password_confirmation" name="password_confirmation" class="form-control">

							@if($errors->has('password_confirmation'))
								<div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
							@endif
						</div>
					</div>
{{--  --}}
				</div>

				<div class="card-footer">
					<button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-dot-circle-o"></i>Update
					</button>
					<a href="{{ route('users.index') }}" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>
					Cancle</a>					
				</div>
					
				</form>


			</div>
		</div>
	</div>
@endsection