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

    public function __construct(    
                                Md\Users $users,
                                Md\Partners $partners,
                                Md\Campaign $campaign,
                                Md\campaignCategory $campaignCat,
                                Md\Newsletter $newsletter
                               )
    {
        $this->users = $users;
        $this->partners = $partners;
        $this->campaign = $campaign;
        $this->campaignCat = $campaignCat;
        $this->newsletter = $newsletter;
        $this->middleware('authMember',['only' => 'getCreateCampaign']);
    }

    public function getIndex()
    {
        $data['partners']       = $this->partners->orderBy('id','desc')->limit(6)->get()->toArray();
        $data['campaignStart']  = $this->campaign->where('status','0')
                                       ->orderBy('id','desc')->limit(3)->get()
                                       ->toArray();
        $data['campaignFinish'] = $this->campaign->where('status','1')
                                       ->orderBy('id','desc')->limit(3)->get()
                                       ->toArray();
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
        $data['newsletter'] = $this->newsletter;

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

    /* Action Create Campaign */

    public function postStoreCampaign(Request $request){
        $input = $request->except('_token');

        // $this->campaign->create();
        $redirect = "/";
        return redirect($redirect)->with('message','Campaign Baru Berhasil Ditambahkan!');

    }

    public function getMeCampaign()
    {
        $data['title'] = $this->title;
        return view($this->folder . '.me_campaign', $data);
    }

    public function getMeDetailCampaign()
    {
        $data['title'] = $this->title;
        return view($this->folder . '.me_detail_campaign', $data);
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

        $countUsers = $this->users->whereEmail($request->get('email'))->count();
        if ($countUsers > 0) {
            return redirect()->back()
                             ->withInput()
                             ->with('messageError','Email sudah Terdaftar.');
        }

        $idGroup = Md\Groups::where(\DB::raw('lower(name_content)'),strtolower('member'))->first()->id;

        $input = $request->except(['password_confirmation','submit']);
        $input['password']  = bcrypt($request->get('password'));
        $input['username']  = $request->get('email');
        $input['status']    = 0;
        $input['no_telp']   = '-';
        $input['remember_token']   = md5($request->get('email'));
        $input['id_group']  = $idGroup;

        \Mail::send('auth.emails.confirmation', $input, function($message) use ($request) {
            $message->to($request->get('email'), "New Member")->subject('Konfirmasi Pendaftaran');
        });

        $this->users->create($input);

        return redirect()->back()
                         ->with('message','Pendaftaran Berhasil, Cek Email untuk melakukan konfirmasi.');

    }

    public function getConfirmation($token = ""){
        if($token == "") return redirect('/')->with('message','Anda tidak memiliki Akses');

        $dataUser = $this->users->where('remember_token', $token);

        if($dataUser->count() < 1) return redirect('/')->with('message','Invalid Token');


        \Session::put('member_session', $dataUser->first());

        $dataUser->update(['status' => '1',
                            'remember_token' => '']);
        
        return redirect('/dashboard')->with('message','Login Berhasil');

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
