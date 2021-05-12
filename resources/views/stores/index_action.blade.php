<a href="{{ route('stores.show', $store) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="View store"> <i class="mdi mdi-eye"></i></a>

<a href="{{ route('stores.edit', $store) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit store"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('stores.destroy', $store) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete store" onclick="event.preventDefault();document.getElementById('remove-store-form_{{ $store->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-store-form_{{ $store->id }}" action="{{ route('stores.destroy', $store) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>