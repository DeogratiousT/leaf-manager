@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.grades.index',$product) }}">{{ $product->product_name}}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('products.update',$product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input class="form-control {{ $errors->has('product_name') ? ' is-invalid' : '' }}" type="text" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
                @if ($errors->has('product_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('product_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="yield_percentage">Yield Percentage</label>
                <input class="form-control {{ $errors->has('yield_percentage') ? ' is-invalid' : '' }}" type="text" id="yield_percentage" name="yield_percentage" value="{{ $product->yield_percentage }}" required>
                @if ($errors->has('yield_percentage'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('yield_percentage') }}
                    </span>
                @endif
            </div>

            <div class="form-group mb-2 text-center">
                <button class="btn btn-primary btn-block" type="submit">
                    <i class="mdi mdi-content-save"></i> Submit
                </button>
            </div>
        </form>
    </div>
@endsection