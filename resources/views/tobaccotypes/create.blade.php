@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('tobaccotypes.index') }}">Tobacco Types</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('tobaccotypes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="type_name">Tobacco Type Name</label>
                <input class="form-control {{ $errors->has('type_name') ? ' is-invalid' : '' }}" type="text" id="type_name" name="type_name" value="{{ old('type_name') }}" placeholder="Enter the Tobacco Type Name" required>
                @if ($errors->has('type_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('type_name') }}
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