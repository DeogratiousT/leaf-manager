@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('lorries.index') }}">Trucks</a></li>
        <li class="breadcrumb-item"><a href="{{ route('lorries.show',$lorry) }}">{{ $lorry->plate_number }}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('lorries.update',$lorry) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="model">Model</label>
                <input class="form-control {{ $errors->has('model') ? ' is-invalid' : '' }}" type="text" id="model" name="model" value="{{ $lorry->model }}" required>
                @if ($errors->has('model'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('model') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="plate_number">Plate Number</label>
                <input class="form-control {{ $errors->has('plate_number') ? ' is-invalid' : '' }}" type="text" id="plate_number" name="plate_number" value="{{ $lorry->plate_number }}" required>
                @if ($errors->has('plate_number'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('plate_number') }}
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