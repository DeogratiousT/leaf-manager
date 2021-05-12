<a href="{{ route('orders.show', $order) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="View Order"> <i class="mdi mdi-eye"></i></a>

<a href="{{ route('orders.edit', $order) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Order"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('orders.destroy', $order) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete Order" onclick="event.preventDefault();document.getElementById('remove-order-form_{{ $order->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-order-form_{{ $order->id }}" action="{{ route('orders.destroy', $order) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>