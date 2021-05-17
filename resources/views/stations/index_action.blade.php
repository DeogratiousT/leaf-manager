<button type="button" class="btn btn-link action-icon" data-toggle="modal" data-target="#station-{{ $station->id }}-modal"><i class="mdi mdi-eye" data-toggle="tooltip" data-placement="bottom" title="View Inventories"></i></button>

<a href="{{ route('all-bales-in-market-pdf', $station) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Export all Bales in this Station"> <i class="mdi mdi-file-export"></i></a>

<a href="{{ route('stations.edit', $station) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Station"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('stations.destroy', $station) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete station" onclick="event.preventDefault();document.getElementById('remove-station-form_{{ $station->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-station-form_{{ $station->id }}" action="{{ route('stations.destroy', $station) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>