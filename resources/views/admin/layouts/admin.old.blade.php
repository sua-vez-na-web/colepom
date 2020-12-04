<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Colepom</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('/admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('/admin/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('/admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('/admin/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('/admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('css/dropify.min.css')}}" rel="stylesheet" type="text/css">
    @yield('css')
</head>

<body>

    @include('admin.layouts.partials._menu')
    <div id="page-wrapper">
        <div class="col-10">
            @include('admin.layouts.partials._messages')
        </div>
        @yield('content')
    </div>

    <!-- jQuery -->
    <script src="{{asset('/admin/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('/admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('/admin/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('/admin/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('/admin/vendor/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('/admin/data/morris-data.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('/admin/dist/js/sb-admin-2.js')}}"></script>
    <script src="{{asset('js/viaCep.js') }}"></script>
    <script src="{{asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/dropify.min.js') }}"></script>

    <script src="{{asset('js/scripts.js') }}"></script>

    @yield('js')

</body>

</html>