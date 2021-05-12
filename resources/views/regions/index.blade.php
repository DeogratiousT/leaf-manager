@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('counties.index') }}">Counties</a></li>
        <li class="breadcrumb-item"><a href="{{ route('counties.regions.index',$county) }}">{{ $county->county_name }}</a></li>
        <li class="breadcrumb-item active">Regions</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('counties.regions.create',$county) }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Region</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="regions-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Region Name</th>
                    <th>County</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#regions-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('counties.regions.index',$county) }}",
                    columns: [
                        { name: 'region_name' },
                        { name: 'county.county_name' },
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

