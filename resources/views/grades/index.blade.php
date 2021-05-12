@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('grades.index') }}">Grades</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('grades.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Grade</a>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#import-csv-modal"><i class="mdi mdi-download mr-1"></i>Import csv</button>

    <!-- Import Modal -->
    <div id="import-csv-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="success-header-modalLabel">Import grades From CSV File</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('grade-import') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="customFile"></label>
                            <input type="file" id="customFile" name="file" class="form-control-file">
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
        <table id="grades-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Grade Name</th>
                    <th>Tobacco Type Name</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#grades-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('grades.index') }}",
                    columns: [
                        { name: 'grade_name' },                               
                        { name: 'tobaccotype.type_name' },  
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

