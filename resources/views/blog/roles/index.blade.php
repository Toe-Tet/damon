@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<a href="{{ route('roles.create') }}" class = "btn btn-primary">
			<i class="icon-people"></i>Create Roles
		</a>
	</div>
</div>
<hr>

<div class="col-md-12">
		<div class="box">
			<table class="uk-table uk-table-hover uk-table-striped" id="roles-table" font="roboto">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Slug</th>
						<th>Permissions</th>
						<th>Created Date</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
</div>

@endsection

@push('scripts')
<script>
	$(function() {
		$('#roles-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{!! route('role.data') !!}',
			columns: [
				{ data: 'id', name: 'id' },
				{ data: 'name', name: 'name' },
				{ data: 'slug', name: 'slug' },
				{ data: 'permissions', name: 'permissions' },
				{ data: 'created_at', name: 'created_at' },
				{ data: 'action', name: 'action', orderable: false, searchable: false }
			]
		});
	});
</script>

@endpush

