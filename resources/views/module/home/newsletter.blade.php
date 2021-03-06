@extends('frontend')

@section('style')

@stop

@section('content')
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Blog</h1>
                            <p>Blog with right sidebar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
    <!--/#action-->

    <section id="blog" class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-7">
                    {{--*/ $newsletterData = $newsletter->paginate(10); /*--}}
                    <div class="row">
                        @if($newsletter->count() > 0)
                            @foreach($newsletterData as $key => $value)
                                {{--*/ $param = 'newsletter/detail/'.$value->id.'/'.preg_replace('/\s+/', '', GlobalHelper::formatDate($value->created_at, 'd m Y')).'/'.$value->slug; /*--}}
                                <div class="col-md-4 col-sm-12 blog-padding-right">
                                    <div class="single-blog two-column">
                                        <div class="post-thumb">
                                            <a href="{!! url($param) !!}"><img src="{!! GlobalHelper::checkImage($value->image, 'article' ) !!}" class="img-responsive" alt=""></a>
                                            <div class="post-overlay">
                                                <span class="uppercase"><a href="#">14 <br><small style="font-size: 13px;margin-left: 1px;">
                                                Feb 2015</small></a></span>
                                            </div>
                                        </div>
                                        <div class="post-content overflow">
                                            <h3 class="post-title bold"><a href="{!! url($param) !!}">{!! $value->title !!}</a></h3>
                                            <h4 class="post-author"><a href="{!! url($param) !!}">Posted by {!! $value->created_by !!}</a></h4>
                                            <p>{!! GlobalHelper::softTrim($value->content,83) !!}</p>
                                            <a href="{!! url($param) !!}" class="read-more">View More</a>
                                            <div class="post-bottom overflow" style="display:none">
                                                <ul class="nav nav-justified post-nav">
                                                    <li><a href="#"><i class="fa fa-tag"></i>Creative</a></li>
                                                    <li><a href="#"><i class="fa fa-heart"></i>32 Love</a></li>
                                                    <li><a href="#"><i class="fa fa-comments"></i>3 Comments</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12"> <label> Newsletter Belum Ada </label> </div>
                        @endif

                    </div>
                    <div class="blog-pagination">
                        {!! $newsletterData->render(); !!}
                    </div>

                    <!-- <div class="blog-pagination">
                        <ul class="pagination">
                          <li><a href="#">left</a></li>
                          <li><a href="#">1</a></li>
                          <li><a href="#">2</a></li>
                          <li class="active"><a href="#">3</a></li>
                          <li><a href="#">4</a></li>
                          <li><a href="#">5</a></li>
                          <li><a href="#">6</a></li>
                          <li><a href="#">7</a></li>
                          <li><a href="#">8</a></li>
                          <li><a href="#">9</a></li>
                          <li><a href="#">right</a></li>
                        </ul>
                    </div> -->
                 </div>
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
