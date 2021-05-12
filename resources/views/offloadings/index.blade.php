@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('offloadings.index') }}">Bales Delivered</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('offloadings.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Off Load Bales</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="loadings-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Bale Number</th>
                    <th>Weight at off Loading</th>
                    <th>Lorry</th>
                    <th>TDRF</th>
                    <th>Market</th>
                    <th>Destination Store</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#loadings-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('offloadings.index') }}",
                    columns: [
                        { name: 'number' },
                        { name: 'weight_at_off_loading' },                               
                        { name: 'lorry.plate_number', orderable:false },                               
                        { name: 'tdrf_number' },                               
                        { name: 'market' ,orderable:false },  
                        { name: 'store' , orderable: false },                             
                        { name: 'state' , orderable: false }                            
                    ]
                });
            });
        </script>
    </div>
    
@endsection

