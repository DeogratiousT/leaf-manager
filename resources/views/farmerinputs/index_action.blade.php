{{-- <a href="{{ route('farmerinputs.edit', $farmerinput) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit farmerinput"> <i class="mdi mdi-square-edit-outline"></i></a> --}}

<a href="{{ route('farmerinputs.destroy', $farmerinput) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete farmerinput" onclick="event.preventDefault();document.getElementById('remove-farmerinput-form_{{ $farmerinput->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-farmerinput-form_{{ $farmerinput->id }}" action="{{ route('farmerinputs.destroy', $farmerinput) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
