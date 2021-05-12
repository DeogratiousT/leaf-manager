<a href="{{ route('counties.regions.index', $county) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="View County"> <i class="mdi mdi-eye"></i></a>

<a href="{{ route('counties.edit', $county) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit County"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('counties.destroy', $county) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete County" onclick="event.preventDefault();document.getElementById('remove-county-form_{{ $county->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-county-form_{{ $county->id }}" action="{{ route('counties.destroy', $county) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>