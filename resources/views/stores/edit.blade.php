@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('stores.index') }}">stores</a></li>
        <li class="breadcrumb-item"><a href="{{ route('stores.show',$store) }}">{{ $store->name }}</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('stores.update',$store) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ $store->name }}" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="region_id">Region</label>
                <select class="form-control {{ $errors->has('region_id') ? ' is-invalid' : '' }}" name="region_id" id="region_id">
                    @foreach ($regions as $region)
                        <option @if($store->region_id == $region->id) selected @endif value="{{ $region->id }}">{{ $region->region_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('region_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('region_id') }}
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