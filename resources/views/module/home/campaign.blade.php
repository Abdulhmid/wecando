@extends('frontend')

@section('style')

@stop

@section('content')
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-6 pull-left">
                            <h1 class="title">LIST</h1>
                            <p>Campaign</p>
                        </div>
                        <div class="col-sm-6 pull-right">
                            {{--*/ $categoryData = App\Models\campaignCategory::all(); /*--}}
                            <select class="form-control" style="margin-top: 12px;">
                                <option value="">-- Pilih Kategori Campaign --</option>
                                @foreach($categoryData as $key => $value)
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->
    
    <section id="blog" class="padding-bottom">
        <div class="container">
            <div class="row">
                {{--*/ $campaignData = $campaign->paginate(10); /*--}}
                @if($campaign->count() > 0)
                    @foreach($campaignData as $key => $value)
                        {{--*/ $param = '/campaign/detail/'.$value->id.'/'.preg_replace('/\s+/', '', GlobalHelper::formatDate($value->created_at, 'd m Y')).'/'.$value->slug; /*--}}
                        <!-- class Arrow : arrow-right  -->
                        <div class="col-md-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <div class="single-blog timeline">
                                <div class="single-blog-wrapper">
                                    <div class="post-thumb">
                                        <img src="{!! GLobalHelper::checkImage('images/campaign/list_'.$value->image) !!}" class="img-responsive" style="width:555px;height:357px" alt="">
                                        <div class="post-overlay">
                                           <span class="uppercase"><a href="{!! url($param) !!}">{!! GlobalHelper::formatDate($value->created_at,'d') !!} <br>
                                           <small>{!! GlobalHelper::formatDate($value->created_at,'M') !!}</small></a></span>
                                       </div>
                                    </div>
                                </div>
                                <div class="post-content overflow" style="padding: 20px 20px 23px;">
                                    <h2 class="post-title bold"><a href="{!! url($param) !!}" style="font-size: 18px;">{!! GlobalHelper::softTrim($value->title,23) !!} </a><b>Donasi : {!! GlobalHelper::idrFormat(CampaignHelper::takeTotalDonateVerify($value->id)) !!}</b></h2>
                                    <h3 class="post-author"><a href="#">Posted by {!! $value->created_by !!} </a></h3>
                                    <p>{!! GlobalHelper::softTrim($value->detail,83) !!}</p>
                                    <a href="{!! url($param) !!}" class="read-more">View More</a>
                                    <div class="post-bottom overflow">
                                        {{--*/ $paramDonate = '/donate/'.$value->id.'/'.$value->slug; /*--}}
                                        <span class="post-date pull-left">{!! GlobalHelper::formatDate($value->created_at,'F d, Y') !!}</span>
                                        <span class="comments-number pull-right"><a href="{!! url($paramDonate) !!}" class="btn btn-danger" style="color: #FFFFFF;">Donasi</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Campaign Belum Ada</label>
                        </div>
                    </div>
                @endif
            </div>
            <div class="blog-pagination">
                {!! $campaignData->render(); !!}
            </div>
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

@stop
