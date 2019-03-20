<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>


    <!-- Custom fonts for this template-->
    @include('admin.layout.link_header')

</head>

<body id="page-top">

@include('admin.layout.header')

<div id="wrapper">

    <!-- Sidebar -->
    @include('admin.layout.sibar')
    @yield('main-content')
</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


@include('admin.layout.link_script')
</body>

</html>
