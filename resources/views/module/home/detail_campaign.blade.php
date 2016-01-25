@extends('frontend')

@section('style')
    <style type="text/css">
        .nav-tabs > li, .nav-pills > li {
            float:none;
            display:inline-block;
            *display:inline; /* ie7 fix */
             zoom:1; /* hasLayout ie7 trigger */
        }

        .nav-tabs, .nav-pills {
            text-align:center;
        }
    </style>
@stop

@section('content')
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-md-6">
                            <h1 class="title">Campaign Detail</h1>
                            <!-- <p>Blog with right sidebar</p> -->
                        </div>
                        <div class="col-md-6 float-right" style="text-align: right;">
                            <a href="{!! url('campaign') !!}" class="btn btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="blog" class="">
        <div class="container">
            @if(count($campaignDetail))
                <div class="row">
                <div class="col-md-12 col-sm-7">
                    <div class="row">
                        <div class="col-sm-6">
                            <iframe width="552" height="557" src="{!! $campaignDetail->video !!}"> </iframe>
                        </div>
                        <div class="col-sm-6">
                            <div class="project-name overflow">
                                <h2 class="bold">{!! $campaignDetail->title !!}</h2>
                                <ul class="nav navbar-nav navbar-default">
                                    <li><a href="#"><i class="fa fa-clock-o"></i>
                                        {!! GlobalHelper::formatDate($campaignDetail->created_at,'d F Y') !!}</a>
                                        </li>
                                    <li><a href="#"><i class="fa fa-tag"></i>{!! $campaignDetail->category->name !!}</a></li>
                                </ul>
                            </div>
                            <!-- <img src="{{ url('additional/home/images/portfolio-details/1.jpg')}}" class="img-responsive" style="height: 275px;width: 560px;" alt=""> -->
                            <div class="project-info overflow">
                                <h3>Campaign Info</h3>
                                <p>{!! GlobalHelper::softTrim($campaignDetail->detail,235) !!}</p>
                            </div>
                            <div class="client overflow">
                                <h3>Client:</h3>
                                <ul class="nav navbar-nav navbar-default">
                                    <li><a href="#"><i class="fa fa-bolt"></i>{!! ConfigurationHelper::takeUserName($campaignDetail->member_id) !!}</a></li>
                                </ul>
                            </div>
                            <div class="skills overflow">
                                <h3>Bagikan:</h3>
                                <ul class="nav navbar-nav navbar-default">
                                    <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                </ul>
                            </div>
                            {{--*/ $paramDonate = '/donate/'.$campaignDetail->id.'/'.$campaignDetail->slug; /*--}}
                            <div class="live-preview">
                                <a href="{!! url($paramDonate) !!}" class="btn btn-common uppercase">Donasi</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12"><hr/>
                    <div class="container">

                        <ul id = "myTab" class = "nav nav-tabs">
                           <li class = "active">
                              <a href = "#detail" data-toggle = "tab">
                                 Detail
                              </a>
                           </li>
                           
                           <li><a href = "#donatur" data-toggle = "tab">Donatur</a></li>
                           <li><a href = "#fundraiser" data-toggle = "tab">Fundraiser</a></li>
                            
                        </ul>

                        <div id = "myTabContent" class = "tab-content">

                           <div class = "tab-pane fade in active" id = "detail">
                              <p>{!! $campaignDetail->detail !!}</p>
                           </div>
                           
                           <div class = "tab-pane fade" id = "donatur">
                              <p>iOS is a mobile operating system developed and distributed by 
                                 Apple Inc. Originally released in 2007 for the iPhone, iPod Touch, and 
                                 Apple TV. iOS is derived from OS X, with which it shares the Darwin 
                                 foundation. iOS is Apple's mobile version of the OS X operating system 
                                 used on Apple computers.</p>
                           </div>
                           
                           <div class = "tab-pane fade" id = "fundraiser">
                              <p>jMeter is an Open Source testing software. It is 100% pure Java 
                                 application for load and performance testing.</p>
                           </div>
                           
                        </div>

                    </div>
                </div>
                </div>
            @else
                <div class="col-md-12" style="text-align:center">Empty</div>
            @endif
        </div>
    </section>
    <!--/#blog-->
     <!--/#portfolio-information-->
    <section id="related-work" class="padding-top padding-bottom">
        <div class="container">
        </div>
    </section>
@stop

@section('script')
<script type="text/javascript">
   $(function () {
      $('#myTab li:eq(1) a').tab('show');
   });
</script>
@stop
