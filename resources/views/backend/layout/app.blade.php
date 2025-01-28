@php
    $user = auth()->user()
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title' , 'Admin') || {{ config("app.name") }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('/')}}assets/backend/images/favicon.ico">

        <!-- App css -->
        <link href="{{asset('/')}}assets/backend/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="{{asset('/')}}assets/backend/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="{{asset('/')}}assets/backend/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

        <!-- Datatables css -->
        <link href="{{asset('/')}}assets/backend/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('/')}}assets/backend/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />

        @yield('style')
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":true, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
                @include('backend.layout.includes.left_sidebar')
            <!-- ========== Left Sidebar End ========== -->

           <!-- ========== Page Content Start ========== -->
            <div class="content-page">
                <div class="content">
                    <!-- ========== Top Bar Start ========== -->
                    @include('backend.layout.includes.top_bar')
                    <!-- ========== Top Bar End ========== -->

                    <!-- ========== Enter Page Content Start ========== -->
                    @yield('content')
                    <!-- ========== Enter Page Content End ========== -->
                </div>
                <!-- ========== Footer Start ========== -->
                    @include('backend.layout.includes.footer')
                <!-- ========== Footer End ========== -->
            </div>
            <!-- ========== Page Content End ========== -->
        </div>

        <!-- ========== Right Sidebar Start ========== -->
        @include('backend.layout.includes.right_sidebar')
        <!-- ========== Right Sidebar End ========== -->


        <!-- bundle -->
        <script src="{{asset('/')}}assets/backend/js/vendor.min.js"></script>
        <script src="{{asset('/')}}assets/backend/js/app.min.js"></script>

        <!-- Apex js -->
        <script src="{{asset('/')}}assets/backend/js/vendor/apexcharts.min.js"></script>

        <!-- Todo js -->
        <script src="{{asset('/')}}assets/backend/js/ui/component.todo.js"></script>

        <!-- demo app -->
        <script src="{{asset('/')}}assets/backend/js/pages/demo.dashboard-crm.js"></script>
        <!-- end demo js-->

        <!-- Datatables js -->
        <script src="{{asset('/')}}assets/backend/js/vendor/jquery.dataTables.min.js"></script>
        <script src="{{asset('/')}}assets/backend/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="{{asset('/')}}assets/backend/js/vendor/dataTables.responsive.min.js"></script>
        <script src="{{asset('/')}}assets/backend/js/vendor/responsive.bootstrap5.min.js"></script>

        <!-- Datatable Init js -->
        <script src="{{asset('/')}}assets/backend/js/pages/demo.datatable-init.js"></script>

        @yield('script')
    </body>
</html>
