@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('stations.index') }}">Markets</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('stations.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Market</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="stations-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Market Name</th>
                    <th>Region</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#stations-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('stations.index') }}",
                    columns: [
                        { name: 'name' },
                        { name: 'region.region_name' },
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

