<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" crossorigin="anonymous">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" id="app">
    <!-- Navbar -->
    @include('Backend.include.navbar')
    <!-- /navbar -->

    <!-- Main Sidebar Container -->
    @include('Backend.include.sidebar')
    <!-- /Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <admin-master></admin-master>
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('Backend.include.footer')

</div>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
<script>
    import AdminMaster from "../../js/components/admin/AdminMaster";
    export default {
        components: {AdminMaster}
    }
</script>