<a href="{{ route('lorries.edit', $lorry) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit lorry"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('lorries.destroy', $lorry) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete lorry" onclick="event.preventDefault();document.getElementById('remove-lorry-form_{{ $lorry->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-lorry-form_{{ $lorry->id }}" action="{{ route('lorries.destroy', $lorry) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>