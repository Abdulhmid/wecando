<section id="features">
    <div class="container">
        <div class="row  {!! !empty($campaignFinish) ? 'col-centered' : '' !!}">
            @if(!empty($campaignFinish))
                <div class="single-features">
                    <div class="col-sm-5 wow {!! ($key % 2 == '0') ? 'align-right' : '' !!} fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
                        <img src="{!! GLobalHelper::checkImage($value['image']) !!}" class="img-responsive" alt="">
                    </div>
                    <div class="col-sm-6 wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
                        <h2>{!! $value['title'] !!}</h2>
                        <P>Target Donasi <b>{!! $value['target'] !!}</b> &amp; Donasi Terkumpul : <b>{!! $value['donate'] !!}</b>. Hastag : <b>{!! $value['hastag'] !!}</b> </P>
                    </div>
                </div>
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