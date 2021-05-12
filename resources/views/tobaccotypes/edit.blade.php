@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('tobaccotypes.index') }}">Tobacco Types</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tobaccotypes.show',$tobaccotype) }}">{{ $tobaccotype->type_name }}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('tobaccotypes.update',$tobaccotype) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="type_name">Tobacco Type Name</label>
                <input class="form-control {{ $errors->has('type_name') ? ' is-invalid' : '' }}" type="text" id="type_name" name="type_name" value="{{ $tobaccotype->type_name }}" required>
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