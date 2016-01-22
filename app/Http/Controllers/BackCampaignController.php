<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Additionals\Datatables\BackCampaignDatatable;
use App\Models as Md;

class BackCampaignController extends Controller
{
    protected $model;
    protected $title = "Manajemen Campaign";
    protected $url = "/";
    protected $folder = "module.back_campaign";
    protected $form;

    public function __construct(Md\Campaign $model)
    {
        $this->model = $model;
    }

    public function getIndex()
    {
        $data['title'] = $this->title;
        return view($this->folder . '.index', $data);
    }

    public function getData(Request $request){
        return (new BackCampaignDatatable($this->model))->make();
    }
}
