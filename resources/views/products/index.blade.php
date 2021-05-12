@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('products.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Product</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="products-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Product Name</th>
                    <th>Yield Percentage</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#products-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('products.index') }}",
                    columns: [
                        { name: 'product_name' },
                        { name: 'yield_percentage' },
                        { name: 'created_at' },   
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

