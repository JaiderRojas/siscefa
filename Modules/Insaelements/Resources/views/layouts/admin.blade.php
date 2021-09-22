<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    @include('insaelements::layouts.partials.headadmin')
    {{-- Laravel Mix - CSS File --}}
    {{-- <link rel="stylesheet" href="{{ mix('css/insa.css') }}"> --}}
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('insaelements::layouts.partials.navbaradmin')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('insaelements::layouts.partials.sidebaradmin')

        <!-- /Main Sidebar Container -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if (Session::has('message'))
                <div class="container-fluid">
                    <div class="mtop16 alert alert-{{ Session::get('typealert') }}"
                        style="display: block; margin-bottom: 16px;">
                        {{ Session::get('message') }}
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <script>
                            $('.alert').slideDown();
                            setTimeout(function() {
                                $('.alert').slideUp();
                            }, 10000);
                        </script>
                    </div>
                </div>
            @endif
            <div class="content">
            @section('content')
            @show
            </div>
           <!-- /.content-wrapper -->
        </div>
        <!-- Main Footer -->
        @include('insaelements::layouts.partials.footer')
     <!-- ./wrapper -->
    </div>
    <!-- /.Main Footer -->
    <!-- REQUIRED SCRIPTS -->
    @section('js')
    @show
    <!-- ./REQUIRED SCRIPTS -->
    {{-- Laravel Mix - JS File --}}
    {{-- <script src="{{ mix('js/insa.js') }}"></script> --}}
</body>
</html>
