@extends('layouts.master')

@section('main')

    <div class="content">
        <!-- Topbar Start -->
            @include('includes.topnav')
        <!-- end Topbar -->
        
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- Error Messages -->
            @include('includes.messages')
            <!-- End Error Messages-->

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            @yield('page-right')
                        </div>
                        <div class="page-title" style="font-size:15px">
                            @yield('title')
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start Main Dynamic Body -->
                @yield('dynamic-content')
            <!-- End Main Dynamic Content  -->

        </div>
        <!-- container -->

    </div>
    
@endsection

