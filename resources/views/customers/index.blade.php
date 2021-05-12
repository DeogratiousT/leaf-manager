@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customers</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('customers.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Customer</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="customers-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Email</th>
                    <th>Tel Number</th>
                    <th>Company Name</th>
                    <th>PO BOX</th>
                    <th>Zip Code</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#customers-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('customers.index') }}",
                    columns: [
                        { name: 'email' },
                        { name: 'mobile_number' },                               
                        { name: 'company_name' },                               
                        { name: 'po_box' },                               
                        { name: 'zip_code' },                               
                        { name: 'city' },                               
                        { name: 'country' },
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

