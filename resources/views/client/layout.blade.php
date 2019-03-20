<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <base href="http://localhost/minyproject/">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/style.css')}}">
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('client/images/trang-chu/logo.png')}}">

</head>

<body>
    @include('client.header')
    @yield('menu')
    @yield('main_content')
    @include('client.footer')
</body>
<script src="{{ asset('client/js/layout.js')}}"></script>

</html>