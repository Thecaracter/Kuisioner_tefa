<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <!-- Mengimpor Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Mengimpor Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS sendiri -->
    <link rel="stylesheet" href="{{ asset('landingasset/css/style.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('landingasset/favicon.ico') }}" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>


    <!-- CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    @include('component.navbarlanding')
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
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
