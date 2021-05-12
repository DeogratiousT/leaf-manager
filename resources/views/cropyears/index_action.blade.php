<a href="{{ route('cropyears.recruitments.index', $cropyear) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="View Crop Year"> <i class="mdi mdi-eye"></i></a>

<a href="{{ route('cropyears.edit', $cropyear) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Crop Year"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('cropyears.destroy', $cropyear) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete Crop Year" onclick="event.preventDefault();document.getElementById('remove-cropyear-form_{{ $cropyear->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-cropyear-form_{{ $cropyear->id }}" action="{{ route('cropyears.destroy', $cropyear) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>