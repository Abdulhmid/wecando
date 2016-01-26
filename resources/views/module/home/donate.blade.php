@extends('frontend')

@section('style')
	<link href="{!! asset('plugins/iCheck/all.css') !!} "rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .nav-tabs > li, .nav-pills > li {
            float:none;
            display:inline-block;
            *display:inline; /* ie7 fix */
             zoom:1; /* hasLayout ie7 trigger */
        }

        .nav-tabs, .nav-pills {
            text-align:center;
        }
		.disabledTab {
		    pointer-events: none;
		}
    </style>
@stop

@section('content')
	<section id="page-breadcrumb">
	    <div class="vertical-center sun">
	         <div class="container">
	            <div class="row">
	                <div class="action">
	                    <div class="col-sm-12">
	                        <h1 class="title">Donasi Untuk {!! $campaign->title !!}</h1>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!--/#action-->

	<section id="portfolio-information" class="padding-top" style="padding-top: 3px;">
        <form id="formAction"  action="{!! url('/store-donate/'.$campaign->id) !!}" method="post" enctype="">
            {{ csrf_field() }}
	    <div class="container" style="">

	        <ul id = "myTab" class = "nav nav-tabs">           
	           <li class="active" id="donationTab"><a href = "#donatur" data-toggle = "tab">Donasi</a></li>
	           <li><a href = "#info" id="infoSet" data-toggle = "tab">Fundraiser</a></li>
	        </ul>

	        <div id = "myTabContent" class = "tab-content">
	           
	           <div class = "tab-pane fade in active" id = "donatur">
	              <div class="row">
	              	<div class="col-md-12" style="">
	              		<h3><b>Masukkan Nominal Donasi Anda</b></h3>
						<input type="number" id="donateUser" class="form-control" style="border-color: rgba(218, 14, 14, 0.75);" placeholder="Masukkan Donasi Anda" required>
	              	</div>
	              	<div class="col-md-12" style="">
	              		<h3><b>Metode Pembayaran </b></h3>
	              		<div class="form-group">
							<div class="">
							  <label><input type="radio" id="optionRadio" name="optradio" value="bni" required> Bank BNI</label>
							</div>
							<div class="">
							  <label><input type="radio" id="optionRadio" name="optradio" value="bca"> Bank BCA</label>
							</div>
							<div class="">
							  <label><input type="radio" id="optionRadio" name="optradio" value="bri"> Bank BRI</label>
							</div>
						</div>
	              	</div>
	              	<div class="col-md-12"><hr/><br/>
	              		<div class="form-group">
	              			<button type="submit" class="btn btn-info">Lanjut</button>
	              		</div>
	              	</div>
	              	<div class="col-md-12">
						<div class="alert alert-success alert-dismissable">
	                    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                    	<h4>	<i class="icon fa fa-check"></i> Informasi !</h4>
	                    	Lengkapi Isian Berikut untuk melakukan DONASI.
	                 	</div>
	              	</div>
	              </div>
	           </div>
	           
	           <div class = "tab-pane fade" id = "info">
	              <p style="text-align:center">Jumlah Donasi Yang harus Dibayarkan.</p><hr/>
	              <p style="text-align:center"><b><h3 style="text-align:center" class="pay">-</h3></b></p>
	              <p style="text-align:center"><b><h3 style="text-align:center" class="method">-</h3></b></p><hr/>
	              <div class="row">
	              	<div class="col-md-12">
	              		<a href="{!! url('/campaign') !!}" class="btn btn-default pull-left">Daftar Campaign</a>
	              		<a href="{!! url('/') !!}" class="btn btn-default pull-right">Halaman Index</a>
	              	</div>
	              </div>
	           </div>
	           
	        </div>

	    </div>
	    </form>
	</section>
	 <!--/#portfolio-information-->
    <section id="related-work" class="padding-top padding-bottom">
        <div class="container">
        </div>
    </section>
@stop

@section('script')
	<script type="text/javascript" src="{!! asset('plugins/iCheck/icheck.min.js') !!}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('input[type="radio"]').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green'
			});

			/*
			** Action Form Send
			*/

            $("#formAction").submit(function(event) {
              /* stop form from submitting normally */
              event.preventDefault();
              /* get some values from elements on the page: */

              var $form = $( this ),
                  url = $form.attr( 'action' );

              /* Send the data using post */
              var posting = $.post( url, {
                  _token: $('#form > input[name="_token"]').val(),
                  donation : $('#donateUser').val(),
                  transfer_method  : $('#optionRadio').val(),
              } );

              /* Alerts the results */
              posting.done(function( data ) {
              	$('#infoSet').trigger('click')
              	
              	$("ul.nav li").removeClass('active').addClass('disabledTab');

              	$(".pay").text(data['donate']);
              	$(".transfer_method").text(data['donate']);
              	console.log(data);
              	if (data == "1") {$('#infoSet').trigger('click');};
              });
              return false;
            });

		});
	</script>
@stop
