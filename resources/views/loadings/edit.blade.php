@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('cropyears.index') }}">Crop Years</a></li>
        <li class="breadcrumb-item"><a href="{{ route('cropyears.show',$cropyear) }}">{{ $cropyear->slug_name}}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('cropyears.update',$cropyear) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="slug_name">Slug Name</label>
                <input class="form-control {{ $errors->has('slug_name') ? ' is-invalid' : '' }}" type="text" id="slug_name" name="slug_name" value="{{ $cropyear->slug_name }}" required>
                @if ($errors->has('slug_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('slug_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="from-date">From</label>
                <input class="form-control {{ $errors->has('from-date') ? ' is-invalid' : '' }}" id="from-date" type="date" name="from-date">
                @if ($errors->has('from-date'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('from-date') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="to-date">To</label>
                <input class="form-control {{ $errors->has('to-date') ? ' is-invalid' : '' }}" id="to-date" type="date" name="to-date">
                @if ($errors->has('to-date'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('to-date') }}
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