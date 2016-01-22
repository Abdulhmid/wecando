<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{!! isset($title) ? $title : "We Can" !!} | We Can If We Together</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link href="{!! asset('additional/home/css/bootstrap.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('additional/home/css/font-awesome.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('additional/home/css/animate.min.css') !!}" rel="stylesheet"> 
        <link href="{!! asset('additional/home/css/lightbox.css') !!}" rel="stylesheet"> 
        <link href="{!! asset('additional/home/css/main.css') !!}" rel="stylesheet">
        <link href="{!! asset('additional/home/css/responsive.css') !!}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{!! url('css/pnotify.custom.min.css') !!}">

        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico">

        @yield('style')

    </head>
    <body >

        <!-- Header -->
        @include('partial.header')
        <!--/#header-->

        <div class="ikiUtama">        
            @yield('content')
        </div>

        <!-- Footer -->
        @include('partial.footer')
        <!--/#footer-->

        <!-- Javascript -->
        <script type="text/javascript" src="{!! asset('additional/home/js/jquery.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('additional/home/js/bootstrap.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('additional/home/js/lightbox.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('additional/home/js/wow.min.js') !!}"></script>
        <script type="text/javascript" src="{!! asset('additional/home/js/main.js') !!}"></script>   

        <script type="text/javascript" src="{!! url('js/custom_alert.js') !!}"></script>

        <!-- Notif -->
        <script type="text/javascript" src="{!! url('plugins/notifications/pnotify.min.js') !!}"></script>
        <script type="text/javascript" src="{!! url('plugins/components_notifications_pnotify.js') !!}"></script>
        <script type="text/javascript" src="{!! url('js/pnotify.custom.min.js') !!}"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                @if(Session::has('error'))
                    notif_error("{!! Session::get('error') !!}");
                @endif
                @if(Session::has('message'))
                    notif_success("{!! Session::get('message') !!}");
                @endif
                @if(Session::has('info'))
                    notif_info("{!! Session::get('info') !!}");
                @endif
                @if(Session::has('warning'))
                    notif_warning("{!! Session::get('warning') !!}");
                @endif
            });
            //  jQuery('.nailthumb-container').nailthumb();
            $('.autohide').delay(5000).fadeOut('slow');
            var Tawk_API=Tawk_API||{}, 
                Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/56a07a031421893c67c29f79/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">

        </script>
        <!--End of Tawk.to Script-->
        @yield('script')

    </body>
</html>