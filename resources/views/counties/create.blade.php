@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('counties.index') }}">Counties</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('counties.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="county_code">County Code</label>
                <input class="form-control {{ $errors->has('county_code') ? ' is-invalid' : '' }}" type="text" id="county_code" name="county_code" value="{{ old('county_code') }}" placeholder="Enter the County Code" required>
                @if ($errors->has('county_code'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('county_code') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="county_name">County Name</label>
                <input class="form-control {{ $errors->has('county_name') ? ' is-invalid' : '' }}" type="text" id="county_name" name="county_name" value="{{ old('county_name') }}" placeholder="Enter the County Name" required>
                @if ($errors->has('county_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('county_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="country">Country Name</label>
                <input class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" type="text" id="country" name="country" value="{{ old('country') }}" placeholder="Enter the Country Name" required>
                @if ($errors->has('country'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('country') }}
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