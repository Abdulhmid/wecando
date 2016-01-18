@extends('backend')

@section('style')
	<link href="{!! asset('plugins/sweet-alert/sweet-alert.css') !!} "rel="stylesheet" type="text/css"/>
	<link href="{!! asset('plugins/iCheck/all.css') !!} "rel="stylesheet" type="text/css"/>
    <link href="{!! url('plugins/summernote') !!}/font-awesome.css" rel="stylesheet">
    <link href="{!! url('plugins/summernote') !!}/summernote.css" rel="stylesheet">
@stop

@section('content')
<section class="content">
<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
		<div class="box box-primary ">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-6">
						<h3 class="box-title">{!! str_contains(Request::segment(2), 'create') ? 'Tambah' : 'Ubah' !!} {!! $title !!}</h3>
					</div>
					<div class="col-xs-6">
						<div class="pull-right">
							<a href="{!! URL::to(GlobalHelper::indexUrl())!!}" class="btn btn-default"> 
								<i class="fa fa-arrow-left"></i> Kembali 
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="box-body">
				@if(Session::has('message'))
				{!! GlobalHelper::messages(Session::get('message')) !!}
				@endif

				{{-- Form --}}
				{!! form_start($form) !!}

				<div class="col-md-8">
                    {!! form_row($form->title, ['default_value' => isset($row) ? $row->title: '']) !!}
                    {!! form_row($form->content, ['default_value' => isset($row) ? $row->content: '']) !!}
				</div>
				<div class="col-md-4">
					{!! form_label($form->image) !!}
					{!! form_widget($form->image, ['attr' => ['style' => 'display:none']]) !!}
					<div class="text-danger">{!! $errors->first('image') !!}</div>

					{!! form_row($form->upload) !!}
					<br>
					<p class="text-center">
						<img id="preview_img" class="img img-thumbnail" style="margin-top: 25px; max-height:200px" src="{{ isset($row) && !empty($row->image) ? asset(GLobalHelper::checkImage($row->image)) : '' }}"  />
					</p>
				</div>
			</div>
					<div class="clearfix"></div>
					@include('partial.form_button')
				{!! form_end($form) !!}

				{{-- End Form --}}
		</div>

	</div>
</div>
</section>
@stop

@section('script')
	<script src="{!! asset('plugins/sweet-alert/sweet-alert.js') !!} " type="text/javascript"></script>    
	<script src="{!! asset('js/alert.js') !!} " type="text/javascript"></script>
	<script src="{!! url('plugins/summernote') !!}/summernote.js"></script>
	<script type="text/javascript">
        $(document).ready(function(){
            $('#content').summernote();
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
			$('#file').click();
		}
    </script>
@stop
