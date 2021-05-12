@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('balereceptions.index') }}">Bale Receptions</a></li>
        <li class="breadcrumb-item"><a href="{{ route('balereceptions.bales.index',$balereception) }}">Bales</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('balereceptions.bales.store',$balereception) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="number">Bale Number</label>
                <input class="form-control {{ $errors->has('number') ? ' is-invalid' : '' }}" type="text" id="number" name="number" value="{{ old('number') }}" placeholder="Enter the Bale's weight at reception" required>
                @if ($errors->has('number'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('number') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="grade_id">Grade</label>
                <select class="form-control {{ $errors->has('grade_id') ? ' is-invalid' : '' }}" name="grade_id" id="grade_id">
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('grade_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('grade_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="weight_at_reception">Weight at Reception</label>
                <input class="form-control {{ $errors->has('weight_at_reception') ? ' is-invalid' : '' }}" type="text" id="weight_at_reception" name="weight_at_reception" value="{{ old('weight_at_reception') }}" placeholder="Enter the Bale's weight at reception" required>
                @if ($errors->has('weight_at_reception'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('weight_at_reception') }}
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
                <label for="state">state</label>
                <select class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" id="state">
                    @foreach (config('bales.statuses') as $state)
                        <option value="{{ $state }}">{{ $state }}</option>
                    @endforeach
                </select>
                @if ($errors->has('state'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('state') }}
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