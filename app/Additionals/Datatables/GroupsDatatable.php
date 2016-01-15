<?php
namespace App\Additionals\Datatables;

class GroupsDatatable {

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
				<a href="{!! url(GLobalHelper::indexUrl().\'/edit/\'.$id) !!}" class="btn btn-flat btn-default btn-sm" data-toggle="tooltip" data-original-title="Edit">
					<i class="fa fa-pencil"></i> Ubah
				</a>
				<a href="{!! url(GLobalHelper::indexUrl().\'/delete/\'.$id) !!}" class="btn btn-flat btn-danger btn-sm btn-delete" data-toggle="tooltip" data-original-title="Delete" onclick="swal_alert(this); return false;">
					<i class="fa fa-trash-o"></i> Hapus
				</a>
				')
			->editColumn('created_at','{!! GlobalHelper::formatDate($created_at) !!}')
			->removeColumn('id')
			->make(true);
	}
}
