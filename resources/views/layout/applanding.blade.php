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
</head>

<body>
    @include('component.navbarlanding')
    @yield('content')
</body>

</html>
