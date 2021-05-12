@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('farminputs.index') }}">farm inputs</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('farminputs.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter the farminput name" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" type="text" id="description" name="description" value="{{ old('description') }}" placeholder="Enter the farminput description" required>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('description') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="quantity">quantity</label>
                <input class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}" type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="Enter the farminput quantity" required>
                @if ($errors->has('quantity'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('quantity') }}
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