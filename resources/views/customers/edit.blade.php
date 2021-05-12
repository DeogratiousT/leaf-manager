@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customers</a></li>
        <li class="breadcrumb-item"><a href="{{ route('customers.show',$customer) }}">{{ $customer->company_name }}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('customers.update',$customer) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" id="email" name="email" value="{{ $customer->email }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('email') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="mobile_number">Telephone Number</label>
                <input class="form-control {{ $errors->has('mobile_number') ? ' is-invalid' : '' }}" type="number" id="mobile_number" name="mobile_number" value="{{ $customer->mobile_number }}" required>
                @if ($errors->has('mobile_number'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('mobile_number') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input class="form-control {{ $errors->has('company_name') ? ' is-invalid' : '' }}" type="text" id="company_name" name="company_name" value="{{ $customer->company_name }}" required>
                @if ($errors->has('company_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('company_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="po_box">PO BOX</label>
                <input class="form-control {{ $errors->has('po_box') ? ' is-invalid' : '' }}" type="number" id="po_box" name="po_box" value="{{ $customer->po_box }}" required>
                @if ($errors->has('po_box'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('po_box') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="zip_code">Zip Code</label>
                <input class="form-control {{ $errors->has('zip_code') ? ' is-invalid' : '' }}" type="number" id="zip_code" name="zip_code" value="{{ $customer->zip_code }}" required>
                @if ($errors->has('zip_code'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('zip_code') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" type="text" id="city" name="city" value="{{ $customer->city }}" required>
                @if ($errors->has('city'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('city') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <input class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" type="text" id="country" name="country" value="{{ $customer->country }}" required>
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