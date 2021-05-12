<a href="{{ route('farminputs.edit', $farminput) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit farminput"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('farminputs.destroy', $farminput) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete farminput" onclick="event.preventDefault();document.getElementById('remove-farminput-form_{{ $farminput->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-farminput-form_{{ $farminput->id }}" action="{{ route('farminputs.destroy', $farminput) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>