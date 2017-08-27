@extends('layouts.master')

@section('content')
	
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<i class="fa fa-edit"></i> Edit Roles
				</div>
				
				<form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
					<div class="card-block">
						{{ csrf_field() }}
						{{ method_field('PATCH') }}

						<div class="form-group row">
							<label for="name" class="col-md-3 form-control-label"> Name:</label>
							<div class="col-md-9">
								<input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}">

								@if($errors->has('name'))
									<div class="text-danger">{{ $errors->first('name') }}</div>
								@endif
							</div>
						</div>
						
						<div class="form-group row">
							<label for="slug" class="col-md-3 form-control-label"> Slug:</label>
							<div class="col-md-9">
								<input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $role->slug) }}">

								@if($errors->has('slug'))
									<div class="text-danger">{{ $errors->first('slug') }}</div>
								@endif
							</div>
						</div>

						@foreach($permissions as $label => $permission)
						<div class="form-group row">
							<label class="form-control-label col-md-3">{{ ucfirst($label) }}</label>
							<div class="col-md-9">
								@foreach($permission as $value)
									<label class="checkbox-inline mr-3" for="permissions[{{ $value }}]">
										<input type="checkbox" id="permissions[{{ $value }}]" 
										name="permissions[{{ $value }}]"
										value="true" {{ array_key_exists($value, $role->permissions) ? 'checked' : '' }}
										 > {{ $value }}
									</label>
								@endforeach
							</div>
						</div>
						@endforeach
						{{--  --}}
					</div>
					
					<div class="card-footer">
						<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o">
						</i> Update</button>
						<a href="{{ route('roles.index') }}" class="btn btn-sm btn-danger"><i class="fa fa-ban">
						</i> Cancle</a>
					</div>

				</form>
				
 

			</div>
		</div>
	</div>

@endsection