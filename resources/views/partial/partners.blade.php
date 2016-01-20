<section id="clients">
    <div class="container">
        <div class="row row-centered">
            <div class="col-sm-12">
                <div class="clients text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                    <p><img src="{!! asset('additional/home/images/home/clients.png') !!}" class="img-responsive" alt=""></p>
                    <h1 class="title">Partner</h1>
                    <p>Organisasi atau Instansi yang sudah bergabung bersama kami . <br> </p><hr/>  
                </div>
                <div class="clients-logo wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                    @if(!empty($partners))
                        @foreach($partners as $key => $value)
                            <div class="col-xs-3 col-sm-2 col-centered" style="">
                                <a href="#" style="color:black;"><img src="{!! GLobalHelper::checkImage($value['image']) !!}" 
                                   class="img-responsive" alt="" data-toggle="tooltip" data-original-title="{!! $value['name'] !!}"
                                   title="{!! $value['name'] !!}">
                                    {!! $value['name'] !!}
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="col-xs-12 col-sm-12" style="text-align:center">
                            <a href="#">Belum ada partner yang terdaftar.</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
 </section>