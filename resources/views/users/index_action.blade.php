<a href="{{ route('users.edit', $user) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit user"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('users.destroy', $user) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete user" onclick="event.preventDefault();document.getElementById('remove-user-form_{{ $user->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-user-form_{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>