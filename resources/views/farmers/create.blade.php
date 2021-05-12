@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('farmers.index') }}">Farmers</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('farmers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Enter the Farmer's First Name" required>
                @if ($errors->has('first_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('first_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input class="form-control {{ $errors->has('middle_name') ? ' is-invalid' : '' }}" type="text" id="middle_name" name="middle_name" value="{{ old('middle_name') }}" placeholder="Enter the Farmer's Middle Name" required>
                @if ($errors->has('middle_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('middle_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Enter the Farmer's Last Name" required>
                @if ($errors->has('last_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('last_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="id_number">ID Number</label>
                <input class="form-control {{ $errors->has('id_number') ? ' is-invalid' : '' }}" type="number" id="id_number" name="id_number" value="{{ old('id_number') }}" placeholder="Enter the Farmer's ID Number" required>
                @if ($errors->has('id_number'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('id_number') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="gender">                  
                    <option value="male">Male</option>
                    <option value="female">Female</option>             
                </select>
                @if ($errors->has('gender'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('gender') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="mobile_number">Mobile Number</label>
                <input class="form-control {{ $errors->has('mobile_number') ? ' is-invalid' : '' }}" type="number" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Enter the Farmer's Mobile Number" required>
                @if ($errors->has('mobile_number'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('mobile_number') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="acrerage">Acrerage</label>
                <input class="form-control {{ $errors->has('acrerage') ? ' is-invalid' : '' }}" type="number" id="acrerage" name="acrerage" value="{{ old('acrerage') }}" placeholder="Enter the Farmer's Acrerage" required>
                @if ($errors->has('acrerage'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('acrerage') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="town">Town</label>
                <input class="form-control {{ $errors->has('town') ? ' is-invalid' : '' }}" type="text" id="town" name="town" value="{{ old('town') }}" placeholder="Enter the Farmer's town" required>
                @if ($errors->has('town'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('town') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="county_id">County</label>
                <select class="form-control {{ $errors->has('county_id') ? ' is-invalid' : '' }}" name="county_id" id="county_id" onchange="var county = document.getElementById('county_id').val();">
                    @foreach ($counties as $county)
                        <option value="{{ $county->id }}">{{ $county->county_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('county_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('county_id') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="region_id">Region</label>
                <select class="form-control {{ $errors->has('region_id') ? ' is-invalid' : '' }}" name="region_id" id="region_id">
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->region_name }}</option>
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