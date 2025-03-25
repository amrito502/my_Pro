<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title>Zamanshops || Seller</title>
    <!-- icon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />
    <!-- fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.ltr.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/highlight.js/styles/github.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/simplebar/simplebar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/quill/quill.snow.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/air-datepicker/css/datepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fullcalendar/main.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
        @include('seller.components.sidebar')
        <div class="sa-app__content">
            @include('seller.components.top_header')
            <!-- sa-app__body -->
            <div id="top" class="sa-app__body px-2 px-lg-4">
               @yield('seller')
            </div>
            @include('seller.components.footer')
        </div>
        <!-- scripts -->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('vendor/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/highlight.js/highlight.pack.js') }}"></script>
        <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
        <script src="{{ asset('vendor/air-datepicker/js/datepicker.min.js') }}"></script>
        <script src="{{ asset('vendor/air-datepicker/js/i18n/datepicker.en.js') }}"></script>
        <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('vendor/fontawesome/js/all.min.js') }}" data-auto-replace-svg="" async=""></script>
        <script src="{{ asset('vendor/chart.js/chart.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('vendor/nouislider/nouislider.min.js') }}"></script>
        <script src="{{ asset('vendor/fullcalendar/main.min.js') }}"></script>
        <script src="{{ asset('js/stroyka.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script src="{{ asset('js/calendar.js') }}"></script>
        <script src="{{ asset('js/demo.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js/demo-chart-js.js') }}"></script>
</body>

</html>