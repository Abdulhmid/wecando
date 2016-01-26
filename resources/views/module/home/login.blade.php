@extends('frontend')

@section('style')

@stop

@section('content')
	<section id="page-breadcrumb">
	    <div class="vertical-center sun">
	         <div class="container">
	            <div class="row">
	                <div class="action">
	                    <div class="col-sm-6 pull-left">
	                        <h1 class="title">Masuk & Jadi Member</h1>
	                    </div>
	                    <div class="col-sm-6 " style="text:align:right">
	                    	<a href="{!! url('/') !!}" class="btn btn-default pull-right">Kembali</a>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

	<!--/#action-->
	{!! Form::open(array('url'=>'go-login', 'id' =>'' ,'class'=>'form-horizontal')) !!}
	<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
	<section id="portfolio-information" class="padding-top" style="padding-top: 3px;">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-6">
                    <div class="form-group">
                        <input type="username" name="username" class="form-control" required="required" placeholder="Username / Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" required="required" placeholder="Password">
                    </div>             
	                <div class="live-preview">
	                    <button type="submit" class="btn btn-common uppercase pull-left"> Submit </button>
	                    <a  href="{!! url('reg') !!}" class="btn btn-common uppercase pull-right"> Daftar </a>
	                </div> 
	            </div>
	            <div class="col-sm-6">
	                <div class="project-name overflow">
	                    <h2 class="bold">Selayang Pandang</h2>
	                </div>
	                <div class="project-info overflow">
	                    <h3>Project Info</h3>
	                    <p> <i>"Setelah anda melakukan login, anda bisa membuat mengelola Campaign yang anda buat."</i></p><br/>
	                    <p><b>We Can Do It</b></p>
	                </div>

	            </div>
	        </div>
	    </div>
	</section>
	{!! Form::close() !!}
	 <!--/#portfolio-information-->
    <section id="related-work" class="padding-top padding-bottom">
        <div class="container">
        </div>
    </section>
@stop

@section('script')

@stop
