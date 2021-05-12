<a href="{{ route('counties.regions.show', ['county'=>$region->county , 'region'=>$region]) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="View Region"> <i class="mdi mdi-eye"></i></a>

<a href="{{ route('counties.regions.edit', ['county'=>$region->county , 'region'=>$region]) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Region"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('counties.regions.destroy', ['county'=>$region->county , 'region'=>$region]) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete Region" onclick="event.preventDefault();document.getElementById('remove-region-form_{{ $region->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-region-form_{{ $region->id }}" action="{{ route('counties.regions.destroy', ['county'=>$region->county , 'region'=>$region]) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>