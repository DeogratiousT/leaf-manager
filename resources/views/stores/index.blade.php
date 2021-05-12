@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('stores.index') }}">stores</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('stores.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add store</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="stores-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>store Name</th>
                    <th>Region</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#stores-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('stores.index') }}",
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

