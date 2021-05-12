@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('counties.index') }}">Counties</a></li>
        <li class="breadcrumb-item"><a href="{{ route('counties.show',$county) }}">{{ $county->county_name}}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('counties.update',$county) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="county_code">County Code</label>
                <input class="form-control {{ $errors->has('county_code') ? ' is-invalid' : '' }}" type="text" id="county_code" name="county_code" value="{{ $county->county_code }}" required>
                @if ($errors->has('county_code'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('county_code') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="county_name">County Name</label>
                <input class="form-control {{ $errors->has('county_name') ? ' is-invalid' : '' }}" type="text" id="county_name" name="county_name" value="{{ $county->county_name }}" required>
                @if ($errors->has('county_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('county_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="country">Country Name</label>
                <input class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" type="text" id="country" name="country" value="{{ $county->country }}" required>
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