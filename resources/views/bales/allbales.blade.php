@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('balereceptions.index') }}">Bales</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
<a href="{{ route('all-bales-pdf') }}" class="btn btn-secondary"><i class="mdi mdi-file-export"></i>&nbsp; Export pdf</a>
@endsection

@section('dynamic-content')
    <div class="mx-2">
        <table id="all-bales-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
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
                $("#all-bales-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('allbales') }}",
                    columns: [
                        { name: 'number' },
                        { name: 'weight_at_off_loading' },                               
                        { name: 'lorry.plate_number', orderable:false },                               
                        { name: 'tdrf_number' },                               
                        { name: 'balereception.market.name' ,orderable:false },  
                        { name: 'balereception.destinationStore.name' , orderable: false },                             
                        { name: 'state' , orderable: false }                            
                    ]
                });
            });
        </script>
    </div>
    
@endsection

