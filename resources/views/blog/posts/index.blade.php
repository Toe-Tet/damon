@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<a href="{{ route('posts.create') }}" class="btn btn-primary">Create Posts</a>
<hr>
		</div>
	</div>

	<div class="col-md-12">
		<div class="box">
			<table class="uk-table uk-table-hover uk-table-striped" id="posts-table" font="roboto">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Body</th>
						<th>User</th>
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
		$('#posts-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: '{!! route('post.data') !!}',
			columns: [
			{ data: 'id', name: 'id' },
			{ data: 'title', name: 'title' },
			{ data: 'body', name: 'body' },
			{ data: 'user', name: 'user' },
			{ data: 'created_at', name: 'created_at' },
			{ data: 'action', name: 'action', orderable: false, searchable: false }
			]
		});
	});
</script>

@endpush