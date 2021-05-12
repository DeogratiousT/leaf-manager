@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.grades.index',$product) }}">{{ $product->product_name }}</a></li>
        <li class="breadcrumb-item active">All Grades</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('products.grades.create',$product) }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Product Grade</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <h4>Product: {{ $product->product_name }}</h4>
        <table class="table table-hover table-centered mb-0">
            <thead>
                <tr>
                    <th>Grade Name</th>
                    <th>Ratio</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($product)
                    @if (count($product->grades) > 0)
                        @foreach ($product->grades as $grade)
                            <tr>
                                <td>{{ $grade->grade_name }}</td>
                                <td><span class="badge badge-primary">{{ $grade->pivot->ratio }}</span></td>
                                <td>
                                    {{-- <a href="{{ route('products.grades.edit',['product'=>$product, 'grade'=>$productgrade]) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Product Grade"> <i class="mdi mdi-square-edit-outline"></i></a> --}}

                                    <a href="{{ route('products.grades.destroy', ['product'=>$product, 'grade'=>$grade]) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Delete Product Grade" onclick="event.preventDefault();document.getElementById('remove-product-grade-form_{{ $grade->id }}').submit();"> <i class="mdi mdi-delete"></i></a>
                                    <form id="remove-product-grade-form_{{ $grade->id }}" action="{{ route('products.grades.destroy', ['product'=>$product, 'grade'=>$grade]) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4"><p style="text-align:center">No Record(s)</p></td>
                        </tr>
                    @endif                    
                @endisset
            </tbody>
        </table>
    </div>
    
@endsection

