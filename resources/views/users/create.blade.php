@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
@endsection

@section('dynamic-content')
    <div class="container">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">User Name</label>
                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter the user Name" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">User Email</label>
                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Enter the User Email" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('email') }}
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