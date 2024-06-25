<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="dark"
    data-sidebar="light" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')| FIXFORYOU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('logo/favicon.ico') }}">
    @include('backend.layout.partials.head-css')
</head>

@section('body')
@include('backend.layout.partials.body')
@show
<!-- Begin page -->
<div id="layout-wrapper">
    @include('backend.layout.partials.topbar')
    @include('backend.layout.partials.sidebar')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('backend.layout.partials.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

{{-- @include('backend.layout.partials.customizer') --}}

<!-- JAVASCRIPT -->
@include('backend.layout.partials.vendor-scripts')
</body>

</html>