<?php
namespace App\Additionals\Datatables;

class ContactsDatatables {

	protected $model;
	public $data;

	public function __construct($model)
	{
		$this->model = $model;
		$this->getData();
	}

	protected function getData()
	{
		$this->data = $this
			->model
			->scopeTakeData();

	}

	public function make()
	{
		return \Datatables::of($this->data)
			->addColumn('action','
				<a href="" data-key-id="{!! $id !!}" data-toggle="modal" data-target="#replyModal" class="btn btn-flat btn-default btn-sm" data-toggle="tooltip" data-original-title="Edit">
					<i class="fa fa-pencil"></i> Reply
				</a>
				<a href="{!! url(GLobalHelper::indexUrl().\'/delete/\'.$id) !!}" class="btn btn-flat btn-danger btn-sm btn-delete" data-toggle="tooltip" data-original-title="Delete" onclick="swal_alert(this); return false;">
					<i class="fa fa-trash-o"></i> Hapus
				</a>
				')
			->editColumn('created_at','{!! GlobalHelper::formatDate($created_at) !!}')
			->editColumn('message','{!! GlobalHelper::softTrim($message,73) !!}')
			->removeColumn('id')
			->make(true);
	}
}
