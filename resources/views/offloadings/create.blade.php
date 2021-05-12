@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('offloadings.index') }}">Bales Delivered</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('offloadings.store') }}" method="POST">
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
                <label for="destination_store_id">Destination Store</label>
                <select class="form-control {{ $errors->has('destination_store_id') ? ' is-invalid' : '' }}" name="destination_store_id" id="destination_store_id">
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('destination_store_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('destination_store_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="weight_at_off_loading">Weight at off_loading</label>
                <input class="form-control {{ $errors->has('weight_at_off_loading') ? ' is-invalid' : '' }}" id="weight_at_off_loading" type="text" name="weight_at_off_loading" placeholder="Enter the weight at off_loading">
                @if ($errors->has('weight_at_off_loading'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('weight_at_off_loading') }}
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