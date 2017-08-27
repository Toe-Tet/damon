@extends('layouts.master')

@section('content')
<form action="{{ route('calanders.store') }}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
<label class="control-label">Select File</label>
<input id="input-2" name="photo" type="file" class="file" multiple data-show-upload="true" data-show-caption="true">
<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
</form>


@endsection

