@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('cropyears.index') }}">Crop Year</a></li>
        <li class="breadcrumb-item"><a href="{{ route('cropyears.recruitments.index',$cropyear) }}">{{ $cropyear->slug_name }}</a></li>
        <li class="breadcrumb-item active">Add Farmers to {{ $cropyear->slug_name }} </li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('cropyears.recruitments.index',$cropyear) }}" id="save-farmers" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Save Farmers"> <i class="mdi mdi-plus-circle"></i>Save Farmer</a>
@endsection

@section('dynamic-content')
    <div class="mx-2">
        <div class="card">
            <div class="card-body">                                    
                <table id="farmers-laratable" class="table table-centered w-100 dt-responsive nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>ID NO.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Acrerage</th>
                            <th>County</th>
                            <th>cropyear</th>
                        </tr>
                    </thead>
                </table>                                    
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->

    <script>
        $(document).ready(function(){
            $("#farmers-laratable").DataTable({
                serverSide: true,
                ajax: "{{ route('farmers.index') }}",
                columns: [
                    { name: 'id_number' },                               
                    { name: 'fullname' , orderable: false},                              
                    { name: 'mobile_number' },                               
                    { name: 'acrerage' },                               
                    { name: 'county.county_name' },                               
                    { name: 'cropyear.slug_name' },                                                            
                ]
            });

            $('#farmers-laratable tbody').on('click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected text-light');
                }
                else {
                    // $('#farmers-laratable').DataTable().$('tr.selected').removeClass('selected text-light');
                    $(this).addClass('selected text-light');
                }

                // var details = $('#farmers-laratable').DataTable().row( this ).data();
                
                // $("#pupilId").val(details[0]);
                // $("#pupilsName").val(details[1]);
                // console.log(details);

            });

            $('#save-farmers').on('click', function () {

                var nationalids = new Array();

                $('#farmers-laratable').DataTable().$('tr.selected').each(function() {

                    var details = $('#farmers-laratable').DataTable().row( this ).data();

                    nationalids.push(details[0]);
                });   

                $.ajax({
                    url: "{{ route('cropyears.recruitments.store',$cropyear) }}",
                    type: "POST",
                    data:{
                        nationalids:nationalids,
                        _token: '{{csrf_token()}}'
                    },
                    success:function(response){
                        console.log(response);
                        if(response) {
                            nationalids.length = 0;
                        }
                    },
                });         
    
            });

        });
    </script>
@endsection