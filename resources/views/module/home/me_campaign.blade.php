@extends('frontend_dashboard')


@section('content')
    <div class="row">
        @if(count($data))
            @foreach($data as $key => $value)
                {{--*/ $param = '/campaign/detail/'.$value->id.'/'.preg_replace('/\s+/', '', GlobalHelper::formatDate($value->created_at, 'd m Y')).'/'.$value->slug; /*--}}
                <div class="col-xs-6 col-sm-6 col-md-4 portfolio-item branded logos">
                    <div class="portfolio-wrapper">
                        <div class="portfolio-single">
                            <div class="portfolio-thumb">
                                <img src="{{ GLobalHelper::checkImage('images/campaign/list_'.$value->image) }}" style="width:261px;height:269px;"  class="img-responsive" alt="">
                            </div>
                            <div class="portfolio-view">
                                <ul class="nav nav-pills">
                                    <li><a href="{!! url($param) !!}"><i class="fa fa-link"></i></a></li>
                                    <li><a href="{{ GLobalHelper::checkImage('images/campaign/list_'.$value->image) }}" data-lightbox="example-set"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="portfolio-info ">
                            <h2>{!! GlobalHelper::softTrim($value->title,21) !!}</h2>
                            <h3> <i><b>Status : {!! $value->status == "1" ? 'Masih Berlangsung' : 'Selesai' !!} </b></i></h3>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12" style="text-aling:center">Belum Ada Campaih</div>
        @endif

    </div>
@endsection

@section('script')

@endsection


