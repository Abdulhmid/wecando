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
						<div class="pull-right">
							<a href="{!! url(GLobalHelper::indexUrl().'/create') !!}" data-original-title="Add" data-toggle="tooltip" class="btn btn-primary">
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
						<tr>
							<th width="7%">Nama</th>
							<th width="2%">Email</th>
							<th width="27%">Message</th>
							<th width="7%">Pembaruan Terakhir</th>
							<th width="10%">Aksi</th>
						</tr>
					</thead>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- /.col -->
</div><!-- /.row -->
</section>


<!-- Modal -->
<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content" style="padding-top:-23px">
            	<form action="{!! url(GlobalHelper::indexUrl().'/store-reply') !!}" id="formReply">	
            		<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            		<input type="hidden" id="key" name="id" value="">
	                <div class="modal-body">
	                	<div class="row">
	                		<div class="col-md-12" style="text-align:center;padding-bottom: s4px;">
								<h5 class="modal-title" id="myModalLabel">Reply Message From Client.</h5>
	                		</div><br/><hr/>
	                		<div class="col-md-12">
	                			<div class="form-group" style="text-align:center">
	                				<span class="from" id="from">...</span>
	                			</div> 
	                		</div>
	                		<div class="col-md-12">
	                			<div class="form-group" style="text-align:center">
	                				<textarea class="form-control" name="messageUsers" id="messageUsers" value=""></textarea>
	                			</div> 
	                		</div>
	                		<div class="col-md-12">
	                  			<div class="form-group" style="text-align:center">
	                  				<textarea class="form-control" name="message" id="message" placeholder="Reply Message Here" required></textarea>
	                			</div>
	                		</div>
	                		<div class="col-md-12">
	                			<div class="form-group" style="text-align:center">
	                				<button type="submit" class="btn btn-warning">Reply</button>
	                			</div>
	                		</div>
	                	</div>
	                </div>
	                <div class="modal-footer">
	                </div>
            	<form>
            </div>
        </div>
    </div>
</div>
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
		$('#replyModal').on('shown.bs.modal', function(e) {
		    $("#message").focus();

			var keyId = $(e.relatedTarget).data('key-id');
			$('#formReply > input[name="id"]').val(keyId);
			/*
			** Actions 
			*/
			$.get("{!! url(GLobalHelper::indexUrl().'/message') !!}", {
					key_id: keyId
			},
			function(data){
				if (data['status'] == "1") {
					console.log("sasadddad");
					$('button[type="submit"]').prop('disabled', true);
				};
				$("#messageUsers").val(data['message']);
				$("#message").val(data['reply']);
				$("#from").text(data['name']);
			});
		});

	    $("#formReply").submit(function(event) {
	      /* stop form from submitting normally */
	      event.preventDefault();
	      /* get some values from elements on the page: */
	      var $form = $( this ),
	          url = $form.attr( 'action' );

	      /* Send the data using post */
	      var posting = $.post( url, {
	      	  _token: $('#formReply > input[name="_token"]').val(),
	          id : $('#key').val(),
	          message : $('#messageUsers').val(),
	          reply  : $('#message').val(),
	      } );

	      /* Alerts the results */
	      posting.done(function( data ) {
	      	console.log("SUkeseesih");
	      	$('#formReply').trigger("reset");
	      	$('#replyModal').modal('hide');
			$(".full-alert").show();
	      });
	      return false;
	    });
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
				{data: 'name', name: 'name'},
				{data: 'email', name: 'email'},
				{data: 'message', name: 'message'},
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
