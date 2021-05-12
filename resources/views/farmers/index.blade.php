@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('farmers.index') }}">Farmers</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('farmers.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Farmer</a>

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import-csv-modal"><i class="mdi mdi-download mr-1"></i>Import csv</button>

    <a href="{{ route('all-farmers-pdf') }}" class="btn btn-secondary"><i class="mdi mdi-file-export-outline mr-1"></i>Export PDF</a>

    <a href="{{ route('all-farmers-excel') }}" class="btn btn-secondary"><i class="mdi mdi-file-export-outline mr-1"></i>Export Excel</a>

    <!-- Import Modal -->
    <div id="import-csv-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="success-header-modalLabel">Import Farmers From CSV File</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div>
                        <p class="text-danger"><b>Sample Excel file. Note that the file headings must appear as show below (including case and order) without any deviation. <br>Gender is either Male or Female</b></p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Id Number</th>
                                    <th>Mobile Number</th>
                                    <th>Acrerage</th>
                                    <th>Town</th>
                                    <th>County</th>
                                    <th>Region</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <form action="{{ route('farmer-import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="file"></label>
                            <input type="file" id="file" name="file" class="form-control-file">
                        </div>
                        <button class="btn btn-success">Import data</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="farmers-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>ID NO.</th>
                    <th>Phone</th>
                    <th>Acrerage</th>
                    <th>Town</th>
                    <th>Gender</th>
                    <th>County</th>
                    <th>Region</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#farmers-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('farmers.index') }}",
                    columns: [
                        { name: 'serial' },                               
                        { name: 'fullname' , orderable: false},                              
                        { name: 'id_number' },                               
                        { name: 'mobile_number' },                               
                        { name: 'acrerage' },                               
                        { name: 'town' },                               
                        { name: 'gender' },                               
                        { name: 'county.county_name' },                               
                        { name: 'region.region_name' },                             
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

