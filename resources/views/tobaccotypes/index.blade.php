@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('tobaccotypes.index') }}">Tobacco Types</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('tobaccotypes.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Tobacco Type</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="tobacco-types-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Type Name</th>
                    <th>created At</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#tobacco-types-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('tobaccotypes.index') }}",
                    columns: [
                        { name: 'type_name' },
                        { name: 'created_at' },   
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

