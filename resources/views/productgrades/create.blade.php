@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.grades.index',$product) }}">{{ $product->product_name }}</a></li>
        <li class="breadcrumb-item active">Create Product Grade</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('products.grades.store',$product) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="product_id">Product name</label>
                <input class="form-control {{ $errors->has('product_id') ? ' is-invalid' : '' }}" type="text" id="product_id" name="product_id" value="{{ $product->product_name }}" readonly required>
                @if ($errors->has('product_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('product_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="grade_id">Grade name</label>
                <select class="form-control {{ $errors->has('grade_id') ? ' is-invalid' : '' }}" name="grade_id" id="grade_id">
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('grade_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('grade_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="ratio">Ratio</label>
                <input class="form-control {{ $errors->has('ratio') ? ' is-invalid' : '' }}" type="number" id="ratio" name="ratio" value="{{ old('ratio') }}" placeholder="Enter the Grade Ratio" required>
                @if ($errors->has('ratio'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('ratio') }}
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