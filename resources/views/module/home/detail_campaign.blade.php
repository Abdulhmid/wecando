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
        /* centered columns styles */
        .row-centered {
            text-align:center;
        }
        .col-centered {
            display:inline-block;
            float:none;
            /* reset the text-align */
            text-align:center;
            /* inline-block space fix */
            margin-right:-4px;
        }
        /*
        ** Style List 
        */

        .list li {
          background: url("http://bradfrost.github.com/this-is-responsive/patterns/images/icon_arrow_right.png") no-repeat 97% 50%;
          border-bottom: 1px solid #ccc;
          display: table;
          border-collapse: collapse;
          width: 100%;
        }
        .inner {
          display: table-row;
          overflow: hidden;
        }
        .li-img {
          display: table-cell;
          vertical-align: middle;
          width: 30%;
          padding-right: 1em;
        }
        .li-img img {
          display: block;
          width: 100%;
          height: auto;
        }
        .li-text {
          display: table-cell;
          vertical-align: middle;
          width: 70%;
        }
        .li-head {
          margin: 0;
        }
        .li-sub {
          margin: 0;
        }

        @media all and (min-width: 45em) {
          .list li {
            float: left;
            width: 50%;
          }
        }

        @media all and (min-width: 75em) {
          .list li {
            width: 33.33333%;
          }
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
                                <h3>Status : <b> {!! $campaignDetail->status == "1" ? 'Masih Berlangsung' : 'Selesai' !!} </b> </h3>
                            </div>
                            <div class="client overflow">
                                <h3>Tanggal Berakhir : <b> {{GlobalHelper::formatDate($campaignDetail->stop,'d F Y')}} </b> </h3>
                            </div>
                            <div class="client overflow">
                                <h3>Target Donasi : <b> {{GlobalHelper::idrFormatRp($campaignDetail->target)}} </b> </h3>
                                <h3>Donasi Terkumpul : <b> {{GlobalHelper::idrFormatRp(CampaignHelper::takeTotalDonate($campaignDetail->id))}} </b>  </h3>
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
                                <a href="{!! url($paramDonate) !!}" class="btn btn-common uppercase"  {!! $campaignDetail->status == "1" ? '' : 'disabled' !!} >Donasi</a>
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
                           <!-- <li><a href = "#fundraiser" data-toggle = "tab">Fundraiser</a></li> -->
                            
                        </ul>

                        <div id = "myTabContent" class = "tab-content">

                           <div class = "tab-pane fade in active" id = "detail">
                              <p>{!! $campaignDetail->detail !!}</p>
                           </div>
                           
                           <div class = "tab-pane fade" id = "donatur">
                              <div class="row " style="text-align:center">
                                <div class="col-md-12 ">
                                  <!-- Content -->

                                    <!--Pattern HTML-->
                                    <div id="pattern" class="pattern">
                                      {{--*/ $campaignDonature = CampaignHelper::takeDonatur($campaignDetail->id); /*--}}
                                      @if(count($campaignDonature))
                                        <ul class="list img-list">
                                          @foreach($campaignDonature as $key => $value)
                                          <li>
                                            <a href="#" class="inner">
                                              <div class="li-img">
                                                <img src="{!! GLobalHelper::checkImage($value->image) !!}" 
                                                     alt="Image Alt Text" style="max-width:96px;max-height:96px" />
                                              </div>
                                              <div class="li-text">
                                                <h4 class="li-head">{{$value->fullname}}</h4>
                                                <p class="li-sub">{{ GlobalHelper::idrFormatRp($value->donateUsers) }}</p>
                                              </div>
                                            </a>
                                          </li>
                                          @endforeach
                                        </ul>
                                        
                                      @else
                                        <label style="text-align:center">Belum Ada Donature</label>
                                      @endif
                                    </div>
                                    <!--End Pattern HTML-->

                                  <!-- Content -->
                                </div>
                              </div>
                           </div>
                           
                           <div class = "tab-pane fade" id = "fundraiser">

                              <div class="row " style="text-align:center">
                                <div class="col-md-12 ">
                                  <!-- Content -->

                                    <!--Pattern HTML-->
                                    <div id="pattern" class="pattern">
                                      <ul class="list img-list">
                                        <li>
                                          <a href="#" class="inner">
                                            <div class="li-img">
                                              <img src="http://bradfrost.github.com/this-is-responsive/patterns/images/fpo_square.png" alt="Image Alt Text" />
                                            </div>
                                            <div class="li-text">
                                              <h4 class="li-head">Title of Content</h4>
                                              <p class="li-sub">Summary of content</p>
                                            </div>
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#" class="inner">
                                            <div class="li-img">
                                              <img src="http://bradfrost.github.com/this-is-responsive/patterns/images/fpo_square.png" alt="Image Alt Text" />
                                            </div>
                                            <div class="li-text">
                                              <h4 class="li-head">Title of More Content</h4>
                                              <p class="li-sub">Summary of more content</p>
                                            </div>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                    <!--End Pattern HTML-->

                                  <!-- Content -->
                                </div>
                              </div>

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
