<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    protected $model;
    protected $title = "Dashboard";
    protected $url = "/";
    protected $folder = "module.home";
    protected $form;

    public function __construct()
    {
    }

    public function getIndex()
    {
        $data['title'] = '';
        $data['title'] = $this->title;
        return view($this->folder . '.index', $data);
    }

    public function getGo()
    {
        $data['title'] = '';
        $data['title'] = $this->title;
        return view($this->folder . '.login', $data);
    }

    public function getReg()
    {
        $data['title'] = '';
        $data['title'] = $this->title;
        return view($this->folder . '.register', $data);
    }

    public function getCampaign()
    {
        $data['title'] = '';
        $data['title'] = $this->title;
        return view($this->folder . '.campaign', $data);
    }

    public function getDonate()
    {
        $data['title'] = '';
        $data['title'] = $this->title;
        return view($this->folder . '.donate', $data);
    }

    public function getNewsletter()
    {
        $data['title'] = '';
        $data['title'] = $this->title;
        return view($this->folder . '.newsletter', $data);
    }

    public function getDetailNewsletter()
    {
        $data['title'] = '';
        $data['title'] = $this->title;
        return view($this->folder . '.detail_newsletter', $data);
    }

}
