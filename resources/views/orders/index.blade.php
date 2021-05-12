@extends('layouts.main')

@section('title')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
        <li class="breadcrumb-item active">All</li>
    </ol>
@endsection

@section('page-right')
    <a href="{{ route('orders.create') }}" class="btn btn-info"><i class="mdi mdi-plus-circle mr-1"></i>Add Order</a>
@endsection

@section('dynamic-content')

    <div class="mx-2">
        <table id="orders-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Order Number</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#orders-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('orders.index') }}",
                    columns: [
                        { name: 'order_number' },
                        { name: 'customer.company_name' },                               
                        { name: 'product.product_name', orderable:false },                               
                        { name: 'amount' },                                 
                        { name: 'created_at' },
                        { name: 'action' , orderable: false, searchable: false }                              
                    ]
                });
            });
        </script>
    </div>
    
@endsection

