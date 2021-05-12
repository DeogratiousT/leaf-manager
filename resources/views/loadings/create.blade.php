@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('loadings.index') }}">Bale in transit</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('loadings.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="bale_id">Bale</label>
                <select class="form-control {{ $errors->has('bale_id') ? ' is-invalid' : '' }}" name="bale_id" id="bale_id">
                    @foreach ($bales as $bale)
                        <option value="{{ $bale->id }}">{{ $bale->number }}</option>
                    @endforeach
                </select>
                @if ($errors->has('bale_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('bale_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="lorry_id">Truck</label>
                <select class="form-control {{ $errors->has('lorry_id') ? ' is-invalid' : '' }}" name="lorry_id" id="lorry_id">
                    @foreach ($lorries as $lorry)
                        <option value="{{ $lorry->id }}">{{ $lorry->plate_number }}</option>
                    @endforeach
                </select>
                @if ($errors->has('lorry_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('lorry_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="weight_at_loading">Weight at loading</label>
                <input class="form-control {{ $errors->has('weight_at_loading') ? ' is-invalid' : '' }}" id="weight_at_loading" type="text" name="weight_at_loading" placeholder="Enter the weight at loading">
                @if ($errors->has('weight_at_loading'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('weight_at_loading') }}
                    </span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="tdrf_number">TDRF Number</label>
                <input class="form-control {{ $errors->has('tdrf_number') ? ' is-invalid' : '' }}" id="tdrf_number" type="text" name="tdrf_number" placeholder="Enter the TDRF number">
                @if ($errors->has('tdrf_number'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('tdrf_number') }}
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