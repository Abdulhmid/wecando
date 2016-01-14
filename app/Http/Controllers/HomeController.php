<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models as Md;

class HomeController extends Controller
{
    protected $model;
    protected $title = "Dashboard";
    protected $url = "/admin";
    protected $folder = "module.dashboard";
    protected $form;

    public function __construct(Md\Users $model)
    {
        $this->model = $model;
    }

    public function getIndex()
    {
        $data['title'] = '';
        $data['title'] = $this->title;
        return view($this->folder . '.index', $data);
    }

    public function getProfil(){
        $dataProfil = $this->model->find(\Auth::user()->id);
        return view($this->folder.'.profil', [
            'title' => "Edit My Profil",
            'row' => $dataProfil,
            'breadcrumb' => 'profil-'.$this->url
        ]);
    }

    public function postStoreProfil($id, Request $request){

        $input = $request->all();
        $rules = array(
            'fullname'=>'required',
            'image'=>'',
            'password' => 'min:6|confirmed',
            'password_confirmation' => 'min:6'
        );

        if( \Request::hasFile('image'))
            $photo  = (new \ImageUpload($input))->upload();


        $validator = \Validator::make(\Request::all(), $rules);
        if ($validator->passes()) {
            $data = [
                'fullname' => $input['fullname']
            ];

            if(!empty($input['password'])) {
                $data = [
                    'password' => bcrypt($input['password'])
                ];
            }

            if(\Request::hasFile('image'))
                $data = [
                    'image' => isset($photo) ? $photo : ""
                ];  $this->model->find($id)->update($data);

            return \Redirect::back()->with('message','Sukses Ubah Data Profil!')
                                    ->withInput(\Request::all());
        }else{
            return redirect($this->url."/profil")->withErrors($validator);
        }

    }
}
