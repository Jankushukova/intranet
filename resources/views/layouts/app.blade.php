<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Интранет BITLAB.KZ</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('front/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/vendors/base/vendor.bundle.base.css')}}">
    <!-- endinject -->

    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('front/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <!-- End plugin css for this page -->
@yield('styles')
<!-- inject:css -->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bitlab.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('front/images/favicon.ico')}}"/>
    <link rel="stylesheet" href="{{asset('front/toastr/toastr.css')}}">

</head>
<body>
@yield('overallContent')

<script src="{{asset('front/vendors/base/vendor.bundle.base.js')}}"></script>

<!-- Plugin js for this page-->
<script src="{{asset('fontawesome/js/all.min.js')}}"></script>
<script src="{{asset('front/bootbox/bootbox.all.min.js')}}"></script>
<script src="{{asset('front/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('front/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('front/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>

<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('front/js/off-canvas.js')}}"></script>
<script src="{{asset('front/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('front/js/template.js')}}"></script>

<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('front/js/dashboard.js')}}"></script>
<script src="{{asset('front/js/data-table.js')}}"></script>
<script src="{{asset('front/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('front/js/dataTables.bootstrap4.js')}}"></script>

<script src="{{asset('front/toastr/toastr.js')}}"></script>

<!-- End custom js for this page-->
@yield('scripts')
</body>

</html>

