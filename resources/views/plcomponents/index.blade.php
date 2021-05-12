@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('production-line-components.index') }}">plcomponents</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('production-line-components.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add plcomponent</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="plcomponents-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#plcomponents-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('production-line-components.index') }}",
                    columns: [
                        { name: 'name' },
                        { name: 'action' , plcomponentable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

