@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('farminputs.index') }}">Farm Input</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('farminputs.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Input</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="farminputs-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#farminputs-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('farminputs.index') }}",
                    columns: [
                        { name: 'name' },
                        { name: 'description' },                               
                        { name: 'quantity' },
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

