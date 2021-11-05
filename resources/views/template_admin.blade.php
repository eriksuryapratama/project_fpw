<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('js/bootstrap.min.js') }}">
    <link rel="stylesheet" href="{{ asset ('css/custom.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Langar&family=Russo+One&display=swap" rel="stylesheet">
    <title>Admin</title>
</head>
<body style="background-color:#5b7d87">

    @include('template_headerAdmin')

    <br><br><br><br>

    @yield('judul')

    <br>

    @yield('konten')

    <br><br>

    @include('template_footer')

</body>
</html>
