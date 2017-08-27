@extends('layouts.master')

@section('content')
  <link rel="stylesheet" type="text/css" href="/css/alert.css">

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<i class="fa fa-edit"></i>Create Roles
			</div>

			<form action="{{ route('roles.store') }}" method="GET" enctype="multipart/form-data" class="form-horizontal">
				<div class="card-block">
					{{ csrf_field() }}

					<!-- name -->
					<div class="form-group row">
						<label class="col-md-3 form-contol-label" for="name">Name:</label>
						<div class="col-md-9">
							<input type="text" id="name" name="name" class="form-control" placeholder="Editor" value="{{ old('name') }}">

							@if($errors->has('name'))
							<div class="text-danger">{{ $errors->first('name') }}</div>
							@endif
						</div>
					</div>
					<!-- email -->
					<div class="form-group row">
						<label for="slug" class="col-md-3 form-control-label">Slug:</label>
						<div class="col-md-9">
							<input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
							@if($errors->has('slug'))
							<div class="text-danger">{{ $errors->first('slug') }}</div>
							@endif
						</div>
					</div>
					<!-- permissions -->
					@foreach($permissions as $label => $permission)
					<div class="form-group row">
						<label class="col-md-3 form-control-label">
							{{ ucfirst($label) }}
						</label>
						<div class="col-md-9">
							@foreach($permission as $value)
							<label class="checkbox-inline mr-3" for="permissions[{{ $value }}]">
								<input type="checkbox" id="permissions[{{ $value }}]" name="permissions[{{ $value }}]" value="true">
								{{ $value }}
							</label>
							@endforeach
						</div>
					</div>
					@endforeach
					<!--  -->
				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
					<a href="{{ route('roles.index') }}" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Cancel</a href="{{ route('roles.index') }}">
					</div>
				</form>
			</div>
		</div>
	</div>


<script src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/alert.js"></script>
@endsection

