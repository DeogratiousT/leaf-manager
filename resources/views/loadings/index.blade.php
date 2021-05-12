@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('loadings.index') }}">Bales In Transit</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('loadings.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Load Bales</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="loadings-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Bale Number</th>
                    <th>Weight at Loading</th>
                    <th>TDRF</th>
                    <th>Lorry</th>
                    <th>Market</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#loadings-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('loadings.index') }}",
                    columns: [
                        { name: 'number' },
                        { name: 'weight_at_loading' },                               
                        { name: 'tdrf_number' },                               
                        { name: 'lorry.plate_number' , orderable: false },                             
                        { name: 'market' ,orderable:false },  
                        { name: 'state' , orderable: false }                            
                    ]
                });
            });
        </script>
    </div>
    
@endsection

