@extends('layouts.master')

@section ('content')
	<div class="row">
		<div class="col-md-12">
			<a href="{{ route('users.create') }}" class="btn btn-primary">
			Create User</a>
<hr>
		</div>



		<div class="col-sm-12">
			<div class="box">
				<table class="uk-table uk-table-hover uk-table-striped table-body" id="users-table" width="100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Created Date</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>

	</div>
@endsection

@push('scripts')
<script>
	$(function() {
		$('#users-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{!! route('user.data') !!}',
			columns: [
				{ data: 'id', name: 'id'},
				{ data: 'name', name: 'name'},
				{ data: 'email', name: 'email'},
				{ data: 'role', name: 'role'},
				{ data: 'created_at', name: 'created_at'},
				{ data: 'action', name: 'action', orderable: false, searchable: false }
			]
		});
				
	});
</script>
@endpush