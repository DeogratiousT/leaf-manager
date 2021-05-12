@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('farmerinputs.index') }}">Farmer Input Allocation</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('farmerinputs.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Allocate Inputs</a>

    <a href="{{ route('farm-input-allocations-pdf') }}" class="btn btn-secondary"><i class="mdi mdi-file-export-outline mr-1"></i>Export PDF</a>

    <a href="{{ route('farm-input-allocations-excel') }}" class="btn btn-secondary"><i class="mdi mdi-file-export-outline mr-1"></i>Export Excel</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="farmerinputs-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Farmer</th>
                    <th>Input</th>
                    <th>Amount</th>
                    <th>Unit</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#farmerinputs-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('farmerinputs.index') }}",
                    columns: [
                        { name: 'id' },                              
                        { name: 'farmer.first_name', orderable: false },                              
                        { name: 'farminput.name' , orderable: false },                               
                        { name: 'amount' },                               
                        { name: 'unit.unit_name' , orderable: false },                             
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

