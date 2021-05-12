@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('counties.index') }}">Counties</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('counties.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add County</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="counties-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>County Code</th>
                    <th>County Name</th>
                    <th>Country</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#counties-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('counties.index') }}",
                    columns: [
                        { name: 'county_code' },
                        { name: 'county_name' },
                        { name: 'country' },
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

