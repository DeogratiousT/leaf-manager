@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('cropyears.index') }}">Crop Years</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('cropyears.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="slug_name">Crop Year Name</label>
                <input class="form-control {{ $errors->has('slug_name') ? ' is-invalid' : '' }}" type="text" id="slug_name" name="slug_name" value="{{ old('slug_name') }}" placeholder="Enter the Grade Number" required>
                @if ($errors->has('slug_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('slug_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="from_date">From</label>
                <input class="form-control {{ $errors->has('from_date') ? ' is-invalid' : '' }}" id="from_date" type="date" name="from_date">
                @if ($errors->has('from_date'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('from_date') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="to_date">To</label>
                <input class="form-control {{ $errors->has('to_date') ? ' is-invalid' : '' }}" id="to_date" type="date" name="to_date">
                @if ($errors->has('to_date'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('to_date') }}
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