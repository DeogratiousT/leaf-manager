<a href="{{ route('grades.edit', $grade) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Grade"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('grades.destroy', $grade) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete Grade" onclick="event.preventDefault();document.getElementById('remove-grade-form_{{ $grade->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-grade-form_{{ $grade->id }}" action="{{ route('grades.destroy', $grade) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>