<a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">
	<i class="fa fa-edit"></i> Edit
</a>

<form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;" id="delete-form">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
	
	<button type="submit" class="btn btn-danger" id="delete-btn">
		<i class="fa fa-trash-o"></i> Delete
	</button>
</form>