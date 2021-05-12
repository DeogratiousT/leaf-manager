@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('units.index') }}">Weighing Units</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('units.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Unit</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="units-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Unit Name</th>
                    <th>Type of Measure</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#units-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('units.index') }}",
                    columns: [
                        { name: 'unit_name' },
                        { name: 'type_of_measure' },
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

