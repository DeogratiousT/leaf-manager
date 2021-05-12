@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('lorries.index') }}">Trucks</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('lorries.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Truck</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="lorries-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Plate Number</th>
                    <th>Model</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#lorries-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('lorries.index') }}",
                    columns: [
                        { name: 'plate_number' },                               
                        { name: 'model' },  
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

