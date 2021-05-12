<a href="{{ route('production-line-components.edit', $plComponent) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit plcomponent"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('production-line-components.destroy', $plComponent) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete plcomponent" onclick="event.preventDefault();document.getElementById('remove-plcomponent-form_{{ $plComponent->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-plcomponent-form_{{ $plComponent->id }}" action="{{ route('production-line-components.destroy', $plComponent) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>