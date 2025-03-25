<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>{{ !empty($meta_title) ? $meta_title : '' }}</title>
    @if (!empty($meta_keyword))
        <meta name="keywords" content="{{ $meta_keyword }}" />
    @endif
    @if (!empty($meta_description))
    <meta name="description" content="{{ $meta_description }}">
    @endif
    <meta name="author" content="zamanshops">
    <link rel="icon" type="image/png" href="{{ asset('assets/zamanshops.png') }}">
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="{{ url('') }}/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ url('') }}/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ url('') }}/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ url('') }}/assets/fonts/wolmart87d5.woff?png09e" as="font" type="font/woff" crossorigin="anonymous">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/vendor/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo1.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="home">
    <div class="page-wrapper">

        <header class="header">
            @include('app.customer.components.header.top_header')


            @include('app.customer.components.header.middle_header')


            @include('app.customer.components.header.bottom_header')
        </header>

        <main class="main">
           @yield('customer')
        </main>

        @include('app.customer.components.footer.footer')
    </div>

    @include('app.customer.components.footer.sticky_footer')

    @include('app.customer.components.footer.scroll_top')

    @include('app.customer.components.footer.mobile_menu')

    @include('app.customer.components.footer.newsletter')

    @include('app.customer.components.footer.quick_view')

    <script src="{{ url('') }}/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/jquery.plugin/jquery.plugin.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/zoom/jquery.zoom.js"></script>
    <script src="{{ url('') }}/assets/vendor/jquery.countdown/jquery.countdown.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/skrollr/skrollr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Swiper JS -->
    <script src="{{ url('') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS -->
    <script src="{{ url('') }}/assets/js/main.min.js"></script>
</body>
</html>
