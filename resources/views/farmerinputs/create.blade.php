@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('farmerinputs.index') }}">Farmer Inputs</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('farmerinputs.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="farmer_id">Farmer</label>
                <select class="form-control {{ $errors->has('farmer_id') ? ' is-invalid' : '' }}" name="farmer_id" id="farmer_id">
                    @foreach ($farmers as $farmer)
                        <option value="{{ $farmer->id }}">{{ $farmer->fullname() }}</option>
                    @endforeach
                </select>
                @if ($errors->has('farmer_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('farmer_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="farminput_id">Farm Input</label>
                <select class="form-control {{ $errors->has('farminput_id') ? ' is-invalid' : '' }}" name="farminput_id" id="farminput_id">
                    @foreach ($farminputs as $farminput)
                        <option value="{{ $farminput->id }}">{{ $farminput->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('farminput_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('farminput_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="unit_id">Unit of Measurement</label>
                <select class="form-control {{ $errors->has('unit_id') ? ' is-invalid' : '' }}" name="unit_id" id="unit_id">
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('unit_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('unit_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="amount">Amount</label>
                <input class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" type="number" id="amount" name="amount" value="{{ old('amount') }}" placeholder="Enter the Input Amount" required>
                @if ($errors->has('amount'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('amount') }}
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