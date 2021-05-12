@extends('layouts.main')

@section('dynamic-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-account-multiple-outline mdi-24px text-success"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Farmers</h5>
                        <h3 class="mt-3 mb-3">
                            {{ $farmers }}
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-package mdi-24px text-info"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Products</h5>
                        <h3 class="mt-3 mb-3">
                            {{ $products }}
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-reorder-horizontal mdi-24px text-success"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Orders</h5>
                        <h3 class="mt-3 mb-3">
                            {{ $orders }}
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-account-multiple mdi-24px text-success"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Customers</h5>
                        <h3 class="mt-3 mb-3">
                            {{ $customers }}
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-leaf mdi-24px text-info"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Tobacco Types</h5>
                        <h3 class="mt-3 mb-3">
                            {{ $tobaccotypes }}
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-star mdi-24px text-success"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Grades</h5>
                        <h3 class="mt-3 mb-3">
                            {{ $grades }}
                        </h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

    </div>
@endsection
