<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models as Md;

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
        $data['title'] = $this->title;
        return view($this->folder . '.index', $data);
    }

    public function getGo()
    {
        $data['title'] = $this->title;
        return view($this->folder . '.login', $data);
    }

    public function getReg()
    {
        $data['title'] = $this->title;
        return view($this->folder . '.register', $data);
    }

    public function getCampaign()
    {
        $data['title'] = $this->title;
        return view($this->folder . '.campaign', $data);
    }

    public function getDonate()
    {
        $data['title'] = $this->title;
        return view($this->folder . '.donate', $data);
    }

    public function getNewsletter()
    {
        $data['title'] = $this->title;
        return view($this->folder . '.newsletter', $data);
    }

    public function getDetailNewsletter()
    {
        $data['title'] = $this->title;
        return view($this->folder . '.detail_newsletter', $data);
    }

    public function getHow()
    {
        $data['title'] = $this->title;
        return view($this->folder . '.how', $data);
    }

    public function getCreateCampaign()
    {
        $data['title'] = $this->title;
        return view($this->folder . '.create_campaign', $data);
    }

    /*
    ** Go To System
    */

    public function postGoLogin(Request $request){
        $username = $request->get('username');
        $password = $request->get('password');

        $user = $this->findUser($username);

        if ($user->count() > 0) {
            if ($user->first()->status == 0) {
                return redirect('/go')
                       ->with('message','Akun Anda Belum Aktif!');
            }

            if (\Auth::attempt(array('email'=>$username, 'password'=>$password))) {
                \Session::put('member_session', $user->first());
                return redirect('/dashboard')->with('message','Login Berhasil');
            }

            return redirect()->back()
                             ->with('message','Username dan Password Tidak Cocok');

        }else{
            return redirect('/go')
                   ->with('message','Akun Anda Belum Terdaftar!');
        }

    }

    public function postGoRegister(Request $request){
        $rules = Md\Users::$rulesRegister; 
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
    }

    public function getGoOut(){
        session()->flush();
        return redirect('/go')
               ->with('message','Terima Kasih!');
    }

    protected function findUser($username)
    {
        return \App\Models\Users::select('*')->whereEmail($username)->orWhere('username',$username);
    }

}
