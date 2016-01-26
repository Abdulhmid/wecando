<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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
    @yield('style')  

</head><!--/head-->

<body>
    <?php $segment = GLobalHelper::indexUrl(); ?>
    @include('partial.header')


    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Dashboard</h1>
                            <p>{!! session('member_session')['fullname'] !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#page-breadcrumb-->

    <section id="projects" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="sidebar portfolio-sidebar">
                        <div class="sidebar-item categories">
                            <h3>Menu</h3>
                            <ul class="nav navbar-stacked">
                                <li class="{!! $segment == 'me-profile' & Request::segment(2) == '' ? 'active' : '' !!}"><a href="{!! url('me-profile') !!}">My Profile<span class="pull-right">(8)</span></a></li>
                                <li class="{!! $segment == 'me-campaign' & Request::segment(2) == 'active' ? 'active' : '' !!}">
                                    <a href="{!! url('me-campaign/active') !!}">Campaign Active<span class="pull-right">(1)</span></a>
                                </li>
                                <li class="{!! $segment == 'me-campaign' & Request::segment(2) == '' ? 'active' : '' !!}"><a href="{!! url('me-campaign') !!}">My Campaign<span class="pull-right">(8)</span></a></li>
                                <li class="{!! $segment == 'create-campaign' ? 'active' : '' !!}"><a href="{!! url('create-campaign') !!}">Buat Campaign<span class="pull-right">(4)</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <!--/#projects-->


    @include('partial.footer')
    <!--/#footer-->


    <!-- <script type="text/javascript" src="js/jquery.isotope.min.js"></script> -->

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
    </script>
     @yield('script')
</body>
</html>
