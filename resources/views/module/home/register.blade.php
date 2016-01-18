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
	                        <h1 class="title">Masuk & Jadi Member</h1>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<!--/#action-->
	{!! Form::open(array('url'=>'go-register', 'id' =>'' ,'class'=>'form-horizontal')) !!}
	<input type="hidden" name="_token" value="<?= csrf_token(); ?>">
	<section id="portfolio-information" class="padding-top" style="padding-top: 3px;">
	    <div class="container">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
	        <div class="row">
	            <div class="col-sm-6">
					<div class="form-group">
	            		<button type="button" class="btn btn-lg btn-primary"><i class="fa fa-facebook"></i> Mendaftar Melalui Facebook </button>
                    </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" required="required" placeholder="Email" value="{!! old('email') !!}">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" required="required" placeholder="Password">
                        </div>     
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="Password">
                        </div>     
                        <div class="form-group">
                            <textarea name="address" id="address" required="required" class="form-control" rows="8" placeholder="Alamat">
                            	{!! Input::old('address') !!}
                            </textarea>
                        </div>            
	                <div class="live-preview">
	                    <input type="submit" name="submit" class="btn btn-common uppercase" value="Submit">
	                </div> 
	            </div>
	            <div class="col-sm-6">
	                <div class="project-name overflow">
	                    <h2 class="bold"> Registrasi Untuk Member Baru </h2>
	                </div>
	                <div class="project-info overflow">
	                    <h3>-- Info --</h3>
	                    <p>
	                    Jadilah member dari salah satu komunitas besar yang bergerak di bidang sosial, <br/> "We Can If We Togheter"
	                    </p>
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
