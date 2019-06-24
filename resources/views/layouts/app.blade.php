<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

 

    <title>@yield('title')</title>

            <!-- Base Css Files -->
        <link href="{{ asset('public/admin/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{ asset('public/admin/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('public/admin/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('public/admin/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{ asset('public/admin/css/animate.css') }}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{ asset('public/admin/css/waves-effect.css') }}" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="{{ asset('public/admin/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{ asset('public/admin/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/admin/css/style.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
         <link href="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <script src="{{ asset('public/admin/js/modernizr.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
</head>
    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
            @guest
            
            
            @else
            
            @include('layouts.partials.topbar')


            <!-- ========== Left Sidebar Start ========== -->

            @include('layouts.partials.sidebar')
            
            
            @endguest
            

            <main class="py-4">
                @yield('content')
            </main>

            @include('layouts.partials.right-bar')
            @include('layouts.partials.footer')
            
        </div>


     <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('public/admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('public/admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/admin/js/waves.js') }}"></script>
        <script src="{{ asset('public/admin/js/wow.min.js') }}"></script>
        <script src="{{ asset('public/admin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/admin/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/chat/moment-2.2.1.js') }}"></script>
        <script src="{{ asset('public/admin/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/jquery-detectmobile/detect.js') }}"></script>
        <script src="{{ asset('public/admin/assets/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('public/admin/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('public/admin/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

        <!-- sweet alerts -->
        {{-- <script src="{{ asset('public/admin/assets/sweet-alert/sweet-alert.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/sweet-alert/sweet-alert.init.js') }}"></script> --}}

        <!-- flot Chart -->
        {{-- <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.selection.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('public/admin/assets/flot-chart/jquery.flot.crosshair.js') }}"></script> --}}

        <!-- Counter-up -->
        <script src="{{ asset('public/admin/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/admin/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="{{ asset('public/admin/js/jquery.app.js') }}"></script>

        <!-- Dashboard -->
        <script src="{{ asset('public/admin/js/jquery.dashboard.js') }}"></script>

        <!-- Chat -->
        {{-- <script src="{{ asset('public/admin/js/jquery.chat.js') }}"></script> --}}

        <!-- Todo -->
        {{-- <script src="{{ asset('public/admin/js/jquery.todo.js') }}"></script> --}}
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

        <script src="{{ asset('public/admin/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/admin/assets/datatables/dataTables.bootstrap.js') }}"></script>
          <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
        
        <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
      </script>

          {!! Toastr::message() !!}
</body>
</html>
