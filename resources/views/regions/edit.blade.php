@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('counties.index') }}">Counties</a></li>
        <li class="breadcrumb-item"><a href="{{ route('counties.regions.index',$county) }}">{{ $county->county_name }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('counties.regions.show',['county'=>$county, 'region'=>$region]) }}">{{ $region->region_name}}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('counties.regions.update',['county'=>$county, 'region'=>$region]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="region_name">Region Name</label>
                <input class="form-control {{ $errors->has('region_name') ? ' is-invalid' : '' }}" type="text" id="region_name" name="region_name" value="{{ $region->region_name }}" required>
                @if ($errors->has('region_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('region_name') }}
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