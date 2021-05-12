@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('grades.index') }}">Grades</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('grades.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="grade_name">Grade Name</label>
                <input class="form-control {{ $errors->has('grade_name') ? ' is-invalid' : '' }}" type="text" id="grade_name" name="grade_name" value="{{ old('grade_name') }}" placeholder="Enter the Grade Name" required>
                @if ($errors->has('grade_name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('grade_name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="tobaccotype_id">Tobacco Type</label>
                <select class="form-control {{ $errors->has('tobaccotype_id') ? ' is-invalid' : '' }}" name="tobaccotype_id" id="tobaccotype_id">
                    @foreach ($tobaccotypes as $tobaccotype)
                        <option value="{{ $tobaccotype->id }}">{{ $tobaccotype->type_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('tobaccotype_id'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('tobaccotype_id') }}
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