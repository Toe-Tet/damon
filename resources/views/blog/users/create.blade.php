@extends ('layouts.master')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card">

				<div class="card-header" >
					<i class="fa fa-edit">Create Users</i>
				</div>
				
				<form action="{{ route('users.store') }}" method="GET" enctype="mulipart/form-data" class="form-horizontal">
				
				<div class="card-block">
					{{ csrf_field() }}
				
					<!-- user name -->
					<div class="form-group row">
						<label for="name" class="col-md-3 form-control-label">Name:</label>
						<div class="col-md-9">
							<input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
							
							@if($errors->has('name'))
							<div class="text-danger">{{ $errors->first('name') }}</div>
							@endif
						</div>
					</div>
					<!-- email -->
					<div class="form-group row">
						<label for="email" class="col-md-3 form-control-label">Email:</label>
						<div class="col-md-9">
							<input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">

							@if($errors->has('email'))
								<div class="text-danger">{{ $errors->first('email') }}</div>
							@endif
						</div>
					</div>
					<!-- role -->
					<div class="form-group row">
						<label for="role" class="col-md-3 form-control-label">Role:</label>
						<div class="col-md-9">
							<select name="role" id="role" type="text" class="form-control">
								<option selected disabled>_____Please Choose Role_____</option>
									@foreach($roles as $role)
										<option value="{{ $role->id }}">
											{{ $role->name }}
										</option>
									@endforeach
							</select>

							@if($errors->has('role'))
								<div class="text-danger">{{ $errors->first('role') }}</div>
							@endif
						</div>
					</div>

					<!-- password -->
					<div class="form-group row">
						<label for="password" class="col-md-3 form-control-label">Password:</label>	
						<div class="col-md-9">
							<input type="password" id="password" name="password" class="form-control">
							
							@if($errors->has('password'))
								<div class="text-danger">{{ $errors->first('password') }}</div>
							@endif
						</div>		
					</div>
				</div>	
				<!-- confirm-password -->
				<div class="form-group row">
					<label for="password_confirmation" class="col-md-3 form-control-label">Confirm Password:</label>
					<div class="col-md-9">
						<input type="password" id="password_confirmation" name="password_confirmation" class="form-control">

						@if($errors->has('password_confirmation'))
							<div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
						@endif
					</div>
				</div>
				
				<!-- button -->
				<div class="card-footer">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>Submit</button>
					<a href="{{ route('roles.index') }}" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>Cancle</a>
				</div>
				
				</form>

			</div>
		</div>
	</div>
	
@endsection

