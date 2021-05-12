@extends('layouts.main')

@section('title')
<ol class="breadcrumb m-0">
    <li class="breadcrumb-item"><a href="{{ route('balereceptions.index') }}">Bale Receptions</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('balereceptions.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="station_id">Market</label>
                <select class="form-control {{ $errors->has('station_id') ? ' is-invalid' : '' }}" name="station_id" id="station_id">
                    @foreach ($stations as $station)
                        <option value="{{ $station->id }}">{{ $station->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('station_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('station_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="store_id">Store</label>
                <select class="form-control {{ $errors->has('store_id') ? ' is-invalid' : '' }}" name="store_id" id="store_id">
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('store_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('store_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="farmer_id">Farmer</label>
                <select class="form-control {{ $errors->has('farmer_id') ? ' is-invalid' : '' }}" name="farmer_id" id="farmer_id">
                    @foreach ($farmers as $farmer)
                        <option value="{{ $farmer->id }}">{{ $farmer->first_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('farmer_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('farmer_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="number_of_bales">Number of Bales</label>
                <input class="form-control {{ $errors->has('number_of_bales') ? ' is-invalid' : '' }}" type="number" id="number_of_bales" name="number_of_bales" value="{{ old('number_of_bales') }}" placeholder="Enter the number of bales received" required>
                @if ($errors->has('number_of_bales'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('number_of_bales') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="officer">Officer on Duty</label>
                <input class="form-control {{ $errors->has('officer') ? ' is-invalid' : '' }}" type="text" id="officer" name="officer" value="{{ old('officer') }}" placeholder="Enter the Name of the officer on duty" required>
                @if ($errors->has('officer'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('officer') }}
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