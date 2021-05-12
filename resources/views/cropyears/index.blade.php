@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('cropyears.index') }}">Crop Years</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('cropyears.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Crop Year</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="cropyears-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Crop Year</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#cropyears-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('cropyears.index') }}",
                    columns: [
                        { name: 'slug_name' },
                        { name: 'from_date' },                               
                        { name: 'to_date' },  
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

