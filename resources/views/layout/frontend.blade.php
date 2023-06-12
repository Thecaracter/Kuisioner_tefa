<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link  href="{{ url(asset('assets/img/favicon.png')) }}" rel="icon">
    <link  href="{{ url(asset('assets/img/apple-touch-icon.png')) }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link  href="{{ url(asset('assets/vendor/aos/aos.css')) }}" rel="stylesheet">
    <link  href="{{ url(asset('assets/vendor/bootstrap/css/bootstrap.min.css')) }}" rel="stylesheet">
    <link  href="{{ url(asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')) }}" rel="stylesheet">
    <link  href="{{ url(asset('assets/vendor/boxicons/css/boxicons.min.css')) }}" rel="stylesheet">
    <link  href="{{ url(asset('assets/vendor/glightbox/css/glightbox.min.css')) }}" rel="stylesheet">
    <link  href="{{ url(asset('assets/vendor/remixicon/remixicon.css')) }}" rel="stylesheet">
    <link  href="{{ url(asset('assets/vendor/swiper/swiper-bundle.min.css')) }}" rel="stylesheet">

	<!-- Mengimpor Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

    <!-- Template Main CSS File -->
    <link  href="{{ url(asset('assets/css/style.css')) }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <!-- <h1 class="logo"><a href="{{ url('/') }}">OnePage</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="{{ url('/') }}" class="logo"><img src="{{ url(asset('assets/img/logo-polije-blu.svg')) }}" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link active" href="{{ url('/') }}">Home</a></li>
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        @yield('content')

    </main><!-- End #main -->
    
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script  href="{{ url(asset('assets/vendor/purecounter/purecounter_vanilla.js')) }}"></script>
    <script  href="{{ url(asset('assets/vendor/aos/aos.js')) }}"></script>
    <script  href="{{ url(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')) }}"></script>
    <script  href="{{ url(asset('assets/vendor/glightbox/js/glightbox.min.js')) }}"></script>
    <script  href="{{ url(asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')) }}"></script>
    <script  href="{{ url(asset('assets/vendor/swiper/swiper-bundle.min.js')) }}"></script>
    <script  href="{{ url(asset('assets/vendor/php-email-form/validate.js')) }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <!-- Template Main JS File -->
    <script  href="{{ url(asset('assets/js/main.js')) }}"></script>
    <script>
        $(document).ready(function() {
            // $('.select2').select2();
            $('.select2').select2({
                theme: 'bootstrap-5'
            });
        });
    </script>

</body>

</html>