@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('production-line-components.index') }}">plcomponents</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('production-line-components.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter the Order name" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
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