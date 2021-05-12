@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('balereceptions.index') }}">Bale Receptions</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('balereceptions.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Reception</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="balereceptions-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Number of Bales</th>
                    <th>Market</th>
                    <th>Store</th>
                    <th>Farmer</th>
                    <th>Officer on Duty</th>
                    <th>Date Received</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#balereceptions-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('balereceptions.index') }}",
                    columns: [
                        { name: 'number_of_bales' },
                        { name: 'station.name', orderable: false },
                        { name: 'store.name', orderable: false },
                        { name: 'farmer.first_name' , orderable:false },
                        { name: 'officer' },
                        { name: 'created_at' },
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

