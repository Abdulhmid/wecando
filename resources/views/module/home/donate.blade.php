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

	<section id="portfolio-information" class="padding-top" style="padding-top: 3px;">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-6">
                    <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Username / Email">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Password">
                        </div>             
	                <div class="live-preview">
	                    <input type="submit" name="submit" class="btn btn-common uppercase" value="Submit">
	                </div>     
                    </form>
	            </div>
	            <div class="col-sm-6">
	                <div class="project-name overflow">
	                    <h2 class="bold">Sailing Vivamus </h2>
	                </div>
	                <div class="project-info overflow">
	                    <h3>Project Info</h3>
	                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus nibh sed elimttis adipiscing. Fusce in hendrerit purus. Suspendisse potenti. Proin quis eros odio, dapibus dictum mauris. Donec nisi libero, adipiscing id pretium eget, consectetur sit amet leo. Nam at eros quis mi egestas fringilla non nec purus.</p>
	                </div>

	            </div>
	        </div>
	    </div>
	</section>
	 <!--/#portfolio-information-->
    <section id="related-work" class="padding-top padding-bottom">
        <div class="container">
        </div>
    </section>
@stop

@section('script')

@stop
