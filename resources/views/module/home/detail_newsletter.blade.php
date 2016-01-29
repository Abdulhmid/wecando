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
                                                <li><a href="#"><i class="fa fa-comments"></i>{{ NewsletterHelper::countCommentNewsletter($newsletterDetail->id)}} Comments</a></li>
                                            </ul><br/>
                                            <form method="POST" id="formComment" name="contact-form" action="{!! url('/newsletter-comment/'.$newsletterDetail->id) !!}">
                                                {{ csrf_field() }}
                                                <ul class="nav navbar-nav post-nav"><br/>
                                                    <textarea cols="127" name="comment" id="commentPost" class="form-control"></textarea><br/>
                                                    <button type="submit" class="btn btn-success">Kirim</button>
                                                </ul>
                                            </form>
                                        </div>
                                        <div class="blog-share">
                                            <span class='st_facebook_hcount'></span>
                                            <span class='st_twitter_hcount'></span>
                                            <span class='st_linkedin_hcount'></span>
                                            <span class='st_pinterest_hcount'></span>
                                            <span class='st_email_hcount'></span>
                                        </div>
                                        <div class="response-area">
                                        <!-- Start Commentar -->

                                        <h2 class="bold">Comments</h2>
                                        <ul class="media-list">
                                            {!! NewsletterHelper::commentNewsletter($newsletterDetail->id) !!}
                                        </ul>    
                                        <!-- End Commentar -->

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
    <script type="text/javascript">
    $(document).ready(function(){
        $("#formComment").submit(function(event) {
          /* stop form from submitting normally */
          event.preventDefault();
          /* get some values from elements on the page: */
          var $form = $( this ),
              url = $form.attr( 'action' );

          /* Send the data using post */
          var posting = $.post( url, {
              _token: $('#form > input[name="_token"]').val(),
              comment : $('#commentPost').val(),
          } );

          /* Alerts the results */
          posting.done(function( data ) {
            $('#formComment').trigger("reset");
            $(".full-alert").show();
          });
          return false;
        });
    });
    </script>
@stop
