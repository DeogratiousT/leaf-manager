<a href="{{ route('units.edit', $unit) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Unit"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('units.destroy', $unit) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete Unit" onclick="event.preventDefault();document.getElementById('remove-unit-form_{{ $unit->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-unit-form_{{ $unit->id }}" action="{{ route('units.destroy', $unit) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>