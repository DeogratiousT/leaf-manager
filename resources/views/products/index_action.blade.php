<a href="{{ route('products.grades.index', $product) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Product Grades"> <i class="mdi mdi-eye"></i></a>

<a href="{{ route('products.edit', $product) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Product"> <i class="mdi mdi-square-edit-outline"></i></a>

<a href="{{ route('products.destroy', $product) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete Product" onclick="event.preventDefault();document.getElementById('remove-product-form_{{ $product->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
<form id="remove-product-form_{{ $product->id }}" action="{{ route('products.destroy', $product) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>