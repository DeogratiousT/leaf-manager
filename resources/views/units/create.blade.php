@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('units.index') }}">Weighing Units</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('units.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="unit_name">Unit Name</label>
                <input class="form-control {{ $errors->has('unit_name') ? ' is-invalid' : '' }}" type="text" id="unit_name" name="unit_name" value="{{ old('unit_name') }}" placeholder="Enter the Unit Name" required>
                @if ($errors->has('unit_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('unit_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="type_of_measure">Type of Measure</label>
                <input class="form-control {{ $errors->has('type_of_measure') ? ' is-invalid' : '' }}" type="text" id="type_of_measure" name="type_of_measure" value="{{ old('type_of_measure') }}" placeholder="Enter the Type of Measure" required>
                @if ($errors->has('type_of_measure'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('type_of_measure') }}
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