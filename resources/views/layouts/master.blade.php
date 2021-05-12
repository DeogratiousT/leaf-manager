@extends('layouts.app')

@section('master-content')
    <!-- ========== Left Sidebar Start ========== -->
    @include('includes.sidenav')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">

        <!-- Main Content Here -->
            @yield('main')
        <!-- content -->

        <!-- Footer Start -->
            @include('includes.footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
    
@endsection