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
                            <h1 class="title">Blog Details</h1>
                        </div>                                                                                
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#page-breadcrumb-->

    <section id="blog-details" class="">
        <div class="container">
            <div class="row">
                @if(count($newsletterDetail))
                    <!-- Start Content -->
                    <div class="col-md-9 col-sm-7">
                        <div class="row">
                             <div class="col-md-12 col-sm-12">
                                <div class="single-blog blog-details two-column">
                                    <div class="post-thumb">
                                        <a href="#">
                                        <img src="{!! GlobalHelper::checkImage($newsletterDetail->image, 'article' ) !!}" class="img-responsive" style="width:850px;height:400px" alt=""></a>
                                        <div class="post-overlay">
                                            <span class="uppercase"><a href="#">{!! GlobalHelper::formatDate($newsletterDetail->created_at,'d') !!} <br>
                                            <small>{!! GlobalHelper::formatDate($newsletterDetail->created_at,'M') !!}</small></a></span>
                                        </div>
                                    </div>
                                    <div class="post-content overflow">
                                        <h2 class="post-title bold"><a href="#">{!! $newsletterDetail->title !!}</a></h2>
                                        <h3 class="post-author"><a href="#">Posted by {!! $newsletterDetail->created_by !!}</a></h3>
                                        <p>{!! $newsletterDetail->content !!}</p>
                                        <div class="post-bottom overflow">
                                            <ul class="nav navbar-nav post-nav">
                                                <li><a href="#"><i class="fa fa-comments"></i>3 Comments</a></li>
                                            </ul>
                                        </div>
                                        <div class="blog-share">
                                            <span class='st_facebook_hcount'></span>
                                            <span class='st_twitter_hcount'></span>
                                            <span class='st_linkedin_hcount'></span>
                                            <span class='st_pinterest_hcount'></span>
                                            <span class='st_email_hcount'></span>
                                        </div>
                                        <div class="response-area">
                                        <h2 class="bold">Comments</h2>
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="post-comment">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object" src="images/blogdetails/2.png" alt="">
                                                    </a>
                                                    <div class="media-body">
                                                        <span><i class="fa fa-user"></i>Posted by <a href="#">Endure</a></span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
                                                        <ul class="nav navbar-nav post-nav">
                                                            <li><a href="#"><i class="fa fa-clock-o"></i>February 11,2014</a></li>
                                                            <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="parrent">
                                                    <ul class="media-list">
                                                        <li class="post-comment reply">
                                                            <a class="pull-left" href="#">
                                                                <img class="media-object" src="images/blogdetails/3.png" alt="">
                                                            </a>
                                                            <div class="media-body">
                                                                <span><i class="fa fa-user"></i>Posted by <a href="#">Endure</a></span>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut </p>
                                                                <ul class="nav navbar-nav post-nav">
                                                                    <li><a href="#"><i class="fa fa-clock-o"></i>February 11,2014</a></li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="post-comment">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object" src="images/blogdetails/4.png" alt="">
                                                    </a>
                                                    <div class="media-body">
                                                        <span><i class="fa fa-user"></i>Posted by <a href="#">Endure</a></span>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliq Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
                                                        <ul class="nav navbar-nav post-nav">
                                                            <li><a href="#"><i class="fa fa-clock-o"></i>February 11,2014</a></li>
                                                            <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                        </ul>                   
                                    </div><!--/Response-area-->
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                     <!-- End Content -->        
                @else
                    <div class="col-md-12" style="text-align:center"></div>
                @endif

                <div class="col-md-3 col-sm-5">
                    <div class="sidebar blog-sidebar">
                        <div class="sidebar-item  recent">
                            <h3>Artikel Lain</h3>
                            {!! NewsletterHelper::otherNewsletter($newsletterDetail->id) !!}
                        </div>
                    </div>
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
