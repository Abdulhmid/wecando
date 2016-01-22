<section id="services">
    <div class="container">
        <div class="row row-centered">
            @if(!empty($campaignStart))
                @foreach($campaignStart as $key => $value)
                <div class="col-sm-4 col-centered text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <div class="wow scaleIn" data-wow-duration="500ms" data-wow-delay="300ms">
                            <img src="{!! GLobalHelper::checkImage('images/campaign/active_'.$value['image']) !!}" alt="">
                        </div>
                        <h2>{!! GLobalHelper::softTrim($value['title'],27)  !!}</h2>
                        <p>{!! GLobalHelper::softTrim($value['detail'],76) !!}</p>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-sm-12 text-center padding wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="single-service">
                        <h2>Belum Ada Campaign Aktif</h2>
                        <p>Tiga Campaign Terbaru yang masih aktif akan selalu tampil.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>