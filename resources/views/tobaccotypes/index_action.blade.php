<a href="{{ route('tobaccotypes.edit', $tobaccotype) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Tobacco Type"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('tobaccotypes.destroy', $tobaccotype) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete Tobacco Type" onclick="event.preventDefault();document.getElementById('remove-tobaccotype-form_{{ $tobaccotype->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-tobaccotype-form_{{ $tobaccotype->id }}" action="{{ route('tobaccotypes.destroy', $tobaccotype) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>