@extends('backend')

@section('style')
	<style type="text/css">
		.nav-tabs > li, .nav-pills > li {
		    float:none;
		    display:inline-block;
		}

		.nav-tabs {
		    text-align:center;
		}
	</style>
@stop

@section('content')
<section class="content">
	<div class="row">
		<div class="box">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-6">
						<h3 class="box-title">Daftar {!! $title !!}</h3>
					</div>
					<div class="col-xs-6">
						<div class="pull-right">
							<a href="{!! url('/home') !!}" data-original-title="Add" data-toggle="tooltip" class="btn btn-default">
								<i class="fa fa-arrow-left"></i> Kembali
							</a>
						</div>
					</div>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body">
				<form class="" id="actionForm"  action="{!! url(GlobalHelper::indexUrl().'/store') !!}" method="post" enctype="multipart/form-data" novalidate>
					{{ csrf_field() }}
					<div class="row">
					<div class="col-md-12">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#global" data-toggle="tab" aria-expanded="false">Global</a></li>
								<li class=""><a href="#media" data-toggle="tab" aria-expanded="true">Media Social</a></li>
								<li class=""><a href="#meta" data-toggle="tab" aria-expanded="false">Meta Data</a></li>
								<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="global">
									<div class="form-group">
										<label for="email" class="control-label">Email</label>
										<input class="form-control" name="email" type="email" value="{!! !empty(ConfigurationHelper::takeValue('email')) ? ConfigurationHelper::takeValue('email') : old('email') !!}" id="email">
									</div>
									<div class="form-group">
										<label for="phone" class="control-label">Phone</label>
										<input class="form-control" name="phone" type="text" value="{!! !empty(ConfigurationHelper::takeValue('phone')) ? ConfigurationHelper::takeValue('phone') : old('phone') !!}" id="phone">
									</div>
									<div class="form-group">
										<label for="fax" class="control-label">Fax</label>
										<input class="form-control" name="fax" type="text" value="{!! !empty(ConfigurationHelper::takeValue('fax')) ? ConfigurationHelper::takeValue('fax') : old('fax') !!}" id="fax">
									</div>
									<div class="form-group">
										<label for="address" class="control-label">Alamat</label>
										<textarea class="form-control" name="address" type="text" value="" id="address">{!! !empty(ConfigurationHelper::takeValue('address')) ? ConfigurationHelper::takeValue('address') : old('address') !!}</textarea>
									</div>
									<div class="form-group">
										<label for="email" class="control-label">Favicon</label>
										<input class="form-control" id="fav" onchange="readUrl(this)" style="display:none" name="fav" type="file">
										<input class="form-control" id="favData" style="display:none" name="favData" type="text" value="{!! ConfigurationHelper::takeValue('fav') !!}">
										<div class="text-danger"></div>
										<button class="form-control btn btn-default" type="button" onclick="chooseFile()">
											<i class="fa fa-upload"></i> Browse
										</button>
										<br>
										<p class="text-center">
											<img id="preview_img" class="img img-thumbnail" style="margin-top: 25px; max-height:100px" 
											src="{{ !empty(ConfigurationHelper::takeValue('fav')) ? asset(GLobalHelper::checkImage(ConfigurationHelper::takeValue('fav'))) : '' }}">
										</p>
									</div>
								</div><!-- /.tab-pane -->
								<div class="tab-pane" id="media">
									<div class="form-group">
										<label for="facebook" class="control-label">Facebook</label>
										<input class="form-control" name="facebook" type="email" value="{!! !empty(ConfigurationHelper::takeValue('facebook')) ? ConfigurationHelper::takeValue('facebook') : old('facebook') !!}" id="facebook">
									</div>
									<div class="form-group">
										<label for="twitter" class="control-label">Twitter</label>
										<input class="form-control" name="twitter" type="text" value="{!! !empty(ConfigurationHelper::takeValue('twitter')) ? ConfigurationHelper::takeValue('twitter') : old('twitter') !!}" id="twitter">
									</div>
									<div class="form-group">
										<label for="google" class="control-label">Google Plus</label>
										<input class="form-control" name="google" type="text" value="{!! !empty(ConfigurationHelper::takeValue('google')) ? ConfigurationHelper::takeValue('google') : old('google') !!}" id="google">
									</div>
									<div class="form-group">
										<label for="instagram" class="control-label">Istagram</label>
										<input class="form-control" name="instagram" type="text" value="{!! !empty(ConfigurationHelper::takeValue('instagram')) ? ConfigurationHelper::takeValue('instagram') : old('instagram') !!}" id="instagram">
									</div>
									<div class="form-group">
										<label for="path" class="control-label">Path</label>
										<input class="form-control" name="path" type="text" value="{!! !empty(ConfigurationHelper::takeValue('path')) ? ConfigurationHelper::takeValue('path') : old('path') !!}" id="path">
									</div>
									<div class="form-group">
										<label for="linked" class="control-label">Linked</label>
										<input class="form-control" name="linked" type="text" value="{!! !empty(ConfigurationHelper::takeValue('linked')) ? ConfigurationHelper::takeValue('linked') : old('linked') !!}" id="linked">
									</div>
								</div><!-- /.tab-pane -->
								<div class="tab-pane" id="meta">
				                    <div class="form-group">
				                        <label class="control-label">Author</label>
				                        <input class="form-control" name="author" placeholder="" required="required" type="text" value="{!! !empty(ConfigurationHelper::takeValue('author')) ? ConfigurationHelper::takeValue('author') : old('author') !!}">
				                    </div>
				                    <div class="form-group">
				                        <label class="control-label">Title</label>
				                            <input class="form-control" name="title" id="title" maxlength="70" placeholder="" required="required" type="text" value="{!! !empty(ConfigurationHelper::takeValue('title')) ? ConfigurationHelper::takeValue('title') : old('title') !!}">
				                        <span class="info text-blue">max : 70 caracter</span>
				                    </div>
				                    <div class="form-group">
				                        <label class="control-label">Keywords</label>
				                        <input class="form-control tokenfield-teal" name="keywords" placeholder="" required="required" type="text" value="{!! !empty(ConfigurationHelper::takeValue('keywords')) ? ConfigurationHelper::takeValue('keywords') : old('keywords') !!}">
				                    </div>
				                    <div class="form-group">
				                        <label class="control-label">Description</label>
				                        <textarea required="required" maxlength="160" id="description" name="description" class="form-control">{!! !empty(ConfigurationHelper::takeValue('description')) ? ConfigurationHelper::takeValue('description') : old('description') !!}</textarea>
				                        <span class="info text-blue">max : 160 caracter</span>
				                    </div>
								</div><!-- /.tab-pane -->
							</div><!-- /.tab-content -->
						</div>
					</div>
					<div class="col-md-12 text-center">
						<div class="form-group">
							<button class="btn btn-success">Simpan</button>
						</div>
					</div>
					</div>
				</form>
			</div>
          </div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</section>
@stop

@section('script')

<script type="text/javascript">
	$(document).ready(function() {
	});
	function readUrl(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#preview_img').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	function chooseFile()
	{
		$('#fav').click();
	}
</script>
@stop
