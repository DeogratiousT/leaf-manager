@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('stations.index') }}">Markets</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('stations.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Market</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="stations-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Market Name</th>
                    <th>Region</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>

        @foreach ($stations as $station)
            <div id="station-{{ $station->id }}-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="standard-modalLabel">{{ $station->name }} Inventory</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">
                                @foreach ($grades as $grade)
                                    <li class="list-group-item"><i class="uil-star mr-1"></i> {{ $grade->grade_name }} :   @php
                                            $load = 0;
                                            $sbales = $station->bales->where('grade_id',$grade->id);
                                            foreach ($sbales as $sbale) {
                                                $load += $sbale->weight_at_reception;
                                                $load -= $sbale->weight_at_loading;
                                            }
                                            echo $load. ' KGs';
                                        @endphp
                                    </li>
                                @endforeach
                            </ul>
                            <h5>Total : 
                                @php
                                    $tsbales = 0;
                                    foreach ($station->bales as $tsbale) {
                                        $tsbales += $tsbale->weight_at_reception;
                                        $tsbales -= $tsbale->weight_at_loading;
                                    }
                                    echo $tsbales . ' KGs';
                                @endphp
                            </h5>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        @endforeach
        
        <script>
            $(document).ready(function(){
                $("#stations-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('stations.index') }}",
                    columns: [
                        { name: 'name' },
                        { name: 'region.region_name' , orderable: false },
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

