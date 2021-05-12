<a href="{{ route('customers.edit', $customer) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Customer"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('customers.destroy', $customer) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete Customer" onclick="event.preventDefault();document.getElementById('remove-customer-form_{{ $customer->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-customer-form_{{ $customer->id }}" action="{{ route('customers.destroy', $customer) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>