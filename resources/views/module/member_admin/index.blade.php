@extends('frontend_dashboard')


@section('content')
    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">Campaign Sedang Berlangsung : </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-4 portfolio-item branded logos">
            <div class="portfolio-wrapper">
                <div class="portfolio-single">
                    <div class="portfolio-thumb">
                        <img src="{{ url('additional/home/images/portfolio/3.jpg')}}" class="img-responsive" alt="">
                    </div>
                    <div class="portfolio-view">
                        <ul class="nav nav-pills">
                            <li><a href="{!! url('me-detail-campaign') !!}"><i class="fa fa-link"></i></a></li>
                            <li><a href="images/portfolio/1.jpg" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="portfolio-info ">
                    <h2>Sailing Vivamus </h2>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4 portfolio-item branded folio">
            <div class="portfolio-wrapper">
                <div class="portfolio-single">
                    <div class="portfolio-thumb">
                        <img src="{{ url('additional/home/images/portfolio/3.jpg')}}" class="img-responsive" alt="">
                    </div>
                    <div class="portfolio-view">
                        <ul class="nav nav-pills">
                            <li><a href="{!! url('me-detail-campaign') !!}"><i class="fa fa-link"></i></a></li>
                            <li><a href="images/portfolio/2.jpg" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="portfolio-info ">
                    <h2>Sailing Vivamus</h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection


