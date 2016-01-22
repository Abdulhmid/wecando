<section id="features"> 
    <div class="container">
        <h1 style="margin-top: -3px;">Campaign Berakhir </h1><hr/>
        <div class="row  {!! !empty($campaignFinish) ? 'col-centered' : '' !!}" style="padding-top:23px;">
            @if(!empty($campaignFinish))
                @foreach($campaignFinish as $key => $value)
                <div class="single-features" style="padding-top: 0px;padding-bottom: 19px;">
                    <div class="col-sm-5 wow {!! ($key == 0 || $key == 1) ? 'align-left' : '' !!} fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="{!! GLobalHelper::checkImage('images/campaign/finish_'.$value['image']) !!}" class="img-responsive" alt="">
                    </div>
                    <div class="col-sm-6 wow {!! ($key == 0 || $key == 1) ? 'fadeInRight' : '' !!}" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2>{!! $value['title'] !!}</h2>
                        <P>Target Donasi <b>{!! $value['target'] !!}</b> &amp; Donasi Terkumpul : <b>{!! $value['donate'] !!}</b>. Hastag : <b>{!! $value['hastag'] !!}</b> </P>
                    </div>
                </div>
                @endforeach
            @else
                <div class="single-features">
                    <div class="col-sm-12 col-centered  wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2>Belum Ada Campaign yang selesai.</h2>
                        <p>Tiga Campaign yang sudah selesai akan selalu tampil.</p>
                    </div>
                </div>

            @endif
        </div>
    </div>
</section>