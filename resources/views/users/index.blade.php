@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('users.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add User</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="users-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#users-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('users.index') }}",
                    columns: [
                        { name: 'name' },
                        { name: 'email' },
                        { name: 'created_at' },
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

