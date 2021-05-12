<a href="{{ route('farmer-activity', $farmer) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Export Year's Activity"> <i class="mdi mdi-file-export-outline text-secondary"></i></a>

<a href="{{ route('farmers.edit', $farmer) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Farmer"> <i class="mdi mdi-square-edit-outline text-info"></i></a>

<a href="{{ route('farmers.destroy', $farmer) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete Farmer" onclick="event.preventDefault();document.getElementById('remove-farmer-form_{{ $farmer->id }}').submit();"> <i class="mdi mdi-delete text-danger"></i></a>
<form id="remove-farmer-form_{{ $farmer->id }}" action="{{ route('farmers.destroy', $farmer) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
