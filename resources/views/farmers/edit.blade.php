@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('farmers.index') }}">Farmers</a></li>
        <li class="breadcrumb-item"><a href="{{ route('farmers.show',$farmer) }}">{{ $farmer->first_name }} {{ $farmer->middle_name }} {{ $farmer->last_name }}</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('farmers.update',$farmer) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" type="text" id="first_name" name="first_name" value="{{ $farmer->first_name }}" required>
                @if ($errors->has('first_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('first_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input class="form-control {{ $errors->has('middle_name') ? ' is-invalid' : '' }}" type="text" id="middle_name" name="middle_name" value="{{ $farmer->middle_name }}" required>
                @if ($errors->has('middle_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('middle_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" type="text" id="last_name" name="last_name" value="{{ $farmer->last_name }}" required>
                @if ($errors->has('last_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('last_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="id_number">ID Number</label>
                <input class="form-control {{ $errors->has('id_number') ? ' is-invalid' : '' }}" type="number" id="id_number" name="id_number" value="{{ $farmer->id_number }}" required>
                @if ($errors->has('id_number'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('id_number') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="gender">                  
                    <option @if($farmer->gender == "male") selected @endif value="male">Male</option>
                    <option @if($farmer->gender == "female") selected @endif value="female">Female</option>             
                </select>
                @if ($errors->has('gender'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('gender') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="mobile_number">Mobile Number</label>
                <input class="form-control {{ $errors->has('mobile_number') ? ' is-invalid' : '' }}" type="number" id="mobile_number" name="mobile_number" value="{{ $farmer->mobile_number }}" required>
                @if ($errors->has('mobile_number'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('mobile_number') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="acrerage">Acrerage</label>
                <input class="form-control {{ $errors->has('acrerage') ? ' is-invalid' : '' }}" type="number" id="acrerage" name="acrerage" value="{{ $farmer->acrerage }}" required>
                @if ($errors->has('acrerage'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('acrerage') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="town">Town</label>
                <input class="form-control {{ $errors->has('town') ? ' is-invalid' : '' }}" type="text" id="town" name="town" value="{{ $farmer->town }}" required>
                @if ($errors->has('town'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('town') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="county_id">County</label>
                <select class="form-control {{ $errors->has('county_id') ? ' is-invalid' : '' }}" name="county_id" id="county_id">
                    @foreach ($counties as $county)
                        <option @if($farmer->county_id == $county->id) selected @endif value="{{ $county->id }}">{{ $county->county_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('county_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('county_id') }}
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