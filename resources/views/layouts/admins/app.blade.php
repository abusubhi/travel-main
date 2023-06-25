<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{($setting = \App\Models\Setting::where('name',"site_name")->first()) ? $setting->value : env('APP_NAME')}}-
        Admin </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    @livewireStyles

</head>

@if(auth()->check())

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">

        @else

            <body class="login-page dark-mode">
            <div class=" ">

            @endif

            {{--    <!-- Preloader -->--}}
            {{--    <div class="preloader flex-column justify-content-center align-items-center">--}}
            {{--        <img class="animation__wobble" src="{{ ($logo = \App\Models\Setting::where('name','logo')->first()) ? url("storage/".$logo->value) : url('global_assets\images\logo.png')}}" alt="AdminLTELogo"--}}
            {{--             height="60" width="60">--}}
            {{--    </div>--}}

            <!--  Preloader End -->


            @if(auth()->check())

                <!-- Main navbar -->
                @include('layouts.admins.header')
                <!-- /main navbar -->
            @endif


            @if(auth()->check())

                <!-- Main sidebar -->
                @include('layouts.admins.sidebar')

                <!-- /main sidebar -->

            @endif


            <!-- Content Wrapper. Contains page content -->

                <div class="  @if(auth()->check()) content-wrapper @endif">

                    @yield('content')

                    {{ isset($slot) ? $slot : null }}


                </div>
                <!-- /.content-wrapper -->


                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->


            @if(auth()->check())

                <!-- Footer -->
                @include('layouts.admins.footer')
                <!-- /footer -->
                @endif


            </div>
            <!-- ./wrapper -->

            <!-- REQUIRED SCRIPTS -->
            <!-- jQuery -->
            <script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
            <!-- Bootstrap -->
            <script src="{{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
            <!-- overlayScrollbars -->
            <script src="{{asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
            <!-- AdminLTE App -->
            <script src="{{asset('dashboard/dist/js/adminlte.js')}}"></script>

            <!-- PAGE PLUGINS -->
            <!-- jQuery Mapael -->
            <script src="{{asset('dashboard/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
            <script src="{{asset('dashboard/plugins/raphael/raphael.min.js')}}"></script>
            <script src="{{asset('dashboard/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
            <script src="{{asset('dashboard/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
            <!-- ChartJS -->
            <script src="{{asset('dashboard/plugins/chart.js/Chart.min.js')}}"></script>

            <!-- AdminLTE for demo purposes -->
            <script src="{{asset('dashboard/dist/js/demo.js')}}"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="{{asset('dashboard/dist/js/pages/dashboard2.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


            @livewireScripts
            @yield('js_code')


                <script>
                    $('.summernote').summernote({
                        tabsize: 2,
                        height: 200,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['insert', ['link', 'picture', 'video']],
                            ['view', ['fullscreen', 'codeview', 'help']]
                        ],

                    });
                </script>




            @if(auth()->check())
            </body>
@endif

</html>
