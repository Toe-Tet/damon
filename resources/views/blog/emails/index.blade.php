@extends('layouts.master')

@section('content')
{{-- <div class="row">
	<div class="col-md-12">
		<a href="{{ route('send.email') }}" class="btn btn-primary">Send Email</a>
		<hr>
	</div>
</div> --}}

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<i class="fa fa-edit"></i> Send Email
			</div>

			<form action="{{ route('email.send') }}" method="GET" enctype="multipart/formdata" class="form-horizontal">
				
				<div class="card-block">
					{{ csrf_field() }}

					<div class="form-group row">
						<label for="title" class="col-md-3 form-control-label">Title:</label>
						<div class="col-md-9">
							<input type="text" id="title" name="title" class="form-control">

							@if($errors->has('title'))
								<div class="text-danger">{{ $errors->first('title') }}</div>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="subject" class="col-md-3 form-control-label">Subject:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="subject" name="subject">

							@if($errors->has('subject'))
								<div class="text-danger">{{ $errors->first('subject') }}</div>
							@endif
						</div>
					</div>				

					<div class="form-group row">
						<label for="content" class="col-md-3 form-control-label">Content:</label>
						<div class="col-md-9">
							<textarea type="text" class="form-control" id="content" name="content" rows="7">
							</textarea>
							@if($errors->has('content'))
								<div class="text-danger">{{ $errors->first('content') }}</div>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="fromemail" class="col-md-3 form-control-label">From Email:</label>
						<div class="col-md-9">
							<input type="email" class="form-control" id="fromemail" name="fromemail">

							@if($errors->has('fromemail'))
								<div class="text-danger">{{ $errors->first('fromemail') }}</div>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="toemail" class="col-md-3 form-control-label">To Email:</label>
						<div class="col-md-9">
							<input type="email" class="form-control" id="toemail" name="toemail">

							@if($errors->has('toemail'))
								<div class="text-danger">{{ $errors->first('toemail') }}</div>
							@endif
						</div>
					</div>

					<div class="form-group row">
						<label for="file" class="col-md-3 form-control-label">Browse:</label>
						<div class="col-md-9">
							<input id="file" name="file" type="file">

							@if($errors->has('file'))
								<div class="text-danger">{{ $errors->first('file') }}</div>
							@endif
						</div>
					</div>
				</div>

										

				<div class="card-footer">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
					<a href="{{ route('emails.index') }}" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>




@endsection