@extends('backend')

@section('style')
<link href="{!! asset('plugins/datatables/dataTables.bootstrap.css') !!} "rel="stylesheet" type="text/css"/>    
<link href="{!! asset('plugins/sweet-alert/sweet-alert.css') !!} "rel="stylesheet" type="text/css"/>
@stop

@section('content')
<section class="content">
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="row">
					<div class="col-xs-6">
						<h3 class="box-title">Daftar {!! $title !!}</h3>
					</div>
					<div class="col-xs-6">
						<div class="pull-right" style="display:none">
							<a href="{!! url(GLobalHelper::indexUrl()) !!}" data-original-title="Add" data-toggle="tooltip" class="btn btn-primary">
								<i class="fa fa-plus"></i> Tambah
							</a>
						</div>
					</div>
				</div>
			</div><!-- /.box-header -->
			<div class="box-body">
				@if(Session::has('message'))
					{!! GlobalHelper::messages(Session::get('message')) !!}
				@endif
				<table id="datatable" class="table table-bordered table-hover">
					<thead>
						<tr align="justify">
							<th width="11%">Kategori</th>
							<th width="11%">Nama Campaign</th>
							<th width="2%">Donate</th>
							<th width="2%">Target</th>
							<th width="2%">Berakhir</th>
							<th width="13%">Pembaruan Terakhir</th>
							<th width="5%">Aksi</th>
						</tr>
					</thead>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
</section>
@stop

@section('script')
<script src="{!! asset('plugins/datatables/jquery.dataTables.js') !!}" type="text/javascript"></script>    
<script src="{!! asset('plugins/datatables/dataTables.bootstrap.js') !!} " type="text/javascript"></script>    
<script src="{!! asset('plugins/sweet-alert/sweet-alert.js') !!} " type="text/javascript"></script>    
<script src="{!! asset('js/alert.js') !!} " type="text/javascript"></script>    

<script type="text/javascript">
	$(document).ready(function() {
		var filter = '';
		datatable(filter);
	});

	function datatable(filter){

		return oTable = $('#datatable').DataTable({
			"dom": '<"tableHeader"<"row"<"col-md-6"f><"col-md-6"p>>><"newProcessing"r>t<"tableFooter"<"row"<"col-md-4"l><"col-md-4"i><"col-md-4"p>>>',
			"order": [[ 1, "asc" ]],
			"bPaginate": true,
			"bLengthChange": true,
			"bFilter": true,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": true,
			"processing": true,
			"bDestroy": true,
			"serverSide": true,
	        "ajax": {
	            "url": "{!! url(GLobalHelper::indexUrl().'/data') !!}",
			    error: function (xhr, error, thrown) {
			    	sweetAlert("Oops...", "Something went wrong!", "error");
			    },
	            data: function (d) {
	            }
	        },
			"columns": [
				{data: 'category_id', name: 'category_id'},
				{data: 'title', name: 'title'},
				{data: 'donate', name: 'donate'},
				{data: 'target', name: 'target'},
				{data: 'stop', name: 'stop'},
				{data: 'created_at', name: 'created_at', searchable : false},
				{data: 'action', name: 'action', searchable : false}
			], 
			fnDrawCallback: function(){
				$('[data-toggle="tooltip"]').tooltip();
			}
		});
	}

</script>
@stop
