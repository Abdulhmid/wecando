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
    protected $folderMember = "module.member_admin";
    protected $form;

    public function __construct(    
        Md\Users $users,
        Md\Partners $partners,
        Md\Campaign $campaign,
        Md\campaignCategory $campaignCat,
        Md\Newsletter $newsletter,
        Md\Contacts $contacts,
        Md\Donate $donate,
        Md\commentNewsletter $commentNewsletter
    )
    {
        $this->users = $users;
        $this->partners = $partners;
        $this->campaign = $campaign;
        $this->campaignCat = $campaignCat;
        $this->commentNewsletter = $commentNewsletter;
        $this->newsletter = $newsletter;
        $this->contacts = $contacts;
        $this->donate = $donate;
        $this->middleware('authMember',['only' => 'getCreateCampaign']);
    }

    public function getIndex()
    {
        $data['partners']       = $this->partners->orderBy('id','desc')->limit(6)->get()->toArray();
        $data['campaignStart']  = $this->campaign->where('status','1')
                                       ->orderBy('id','desc')->limit(3)->get()
                                       ->toArray();
        $data['campaignFinish'] = $this->campaign->where('status','0')
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

    public function getCampaign($type = "", $id= "", $date = "" , $slug = "")
    {
        if($type == "" || $id == "" || $date == "" || $slug == "") :
                $data['campaign'] = $this->campaign;
                $data['title'] = $this->title;
                return view($this->folder . '.campaign', $data);
            elseif($type == 'kategori') :
                $data['campaign'] = $this->campaign->where(['category_id' => $id]);
                $data['title'] = $this->title;
                return view($this->folder . '.campaign', $data);
            elseif($type == 'detail') :
                $data['campaignDetail'] = $this->campaign->with('category')->find($id);
                return view($this->folder . '.detail_campaign', $data);
            else :
                $data['campaign'] = $this->campaign;
                $data['title'] = $this->title;
                return view($this->folder . '.campaign', $data);     
        endif ;
    }

    /*
    ** Donation
    */

    public function getDonate($id = "", $slug ="")
    {
        if(empty(session('member_session'))) return redirect('go')->with('error','Silahkan Login Terlebih Dahulu');

        if($id == "" || $slug = "") return redirect()->back()->with('error','Something Wrong..!');

        $data['title'] = $this->title;
        $data['campaign'] = $this->campaign->with('category')->find($id);
        return view($this->folder . '.donate', $data);
    }

    public function postStoreDonate(Request $request, $id){
        if(empty(session('member_session'))) return redirect('go')->with('error','Silahkan Login Terlebih Dahulu');

        try {
            $keyDonate = mt_rand( 100, 999 );
            $inputData['user_id'] = !empty(session('member_session')['id']) ? session('member_session')['id'] : "";
            $inputData['donate'] = $request->get('donation')+$keyDonate;
            $inputData['transfer_method'] = $request->get('transfer_method');
            $inputData['campaign_id'] = $id;
            $inputData['key_donate'] = $keyDonate;
            $data = $this->donate->create($inputData);
            return $data;   
        } catch (Exception $e) {
            return "0";   
        }
    }

    public function getNewsletter($type = "", $id= "", $date = "" , $slug = "")
    {
        if($type == "" || $id == "" || $date == "" || $slug == "") :
                $data['title'] = $this->title;
                $data['newsletter'] = $this->newsletter;

                return view($this->folder . '.newsletter', $data);
            else :
                $data['newsletterDetail'] = $this->newsletter->find($id);
                return view($this->folder . '.detail_newsletter', $data);
        endif ;
    }

    public function postNewsletterComment(Request $request, $id = ""){
        $input = $request->except('_token');
        try {
            $input['newsletter_id'] = $id;
            $this->commentNewsletter->create($input);            
        } catch (Exception $e) {
            return "0";
        }
    }

    public function getHow()
    {
        $data['title'] = $this->title;
        return view($this->folder . '.how', $data);
    }

    public function getCreateCampaign()
    {
        $data['title'] = $this->title;
        $data['categoryCampaign'] = $this->campaignCat->all();
        return view($this->folder . '.create_campaign', $data);
    }

    /* Action Create Campaign */

    public function postStoreCampaign(Request $request){
        $input = $request->except('_token','state');

        if( \Request::hasFile('image'))
            $photo  = (new \ImageUploadCampaign($input))->upload();

        $input['slug'] = str_slug($input['title'],"-"); ;
        $input['target'] = str_replace(",", "", $input['target']); 
        $input['image'] = isset($photo) ? $photo : "";
        $input['member_id'] = session('member_session')['id'];
        $this->campaign->create($input);
        $redirect = "/";
        return redirect($redirect)->with('message','Campaign Baru Berhasil Ditambahkan!');

    }

    public function getMeCampaign($status = "")
    {
        $data['title'] = $this->title;
        $data['data'] = $this->campaign->get();
        if($status <> "") $data['data'] = $this->campaign->whereStatus(1)->get();

        return view($this->folder . '.me_campaign', $data);
    }

    public function getMeProfile($status = "")
    {
        $data['title'] = $this->title;
        $data['data'] = $this->campaign->get();
        $data['row'] = $this->users->find(session('member_session')['id']);

        return view($this->folderMember . '.profile', $data);
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
                ];  $this->users->find($id)->update($data);

            return redirect('/me-profile')->with('message','Sukses Ubah Data Profil!');

        }else{
            return redirect()->back()->withErrors($validator);
        }

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

    public function getTakeCity()
    {
        $state_id = \Request::input('province_id');
        $emptyData = [];
        if(empty($state_id)) return $emptyData;

        $queryCity = Md\City::where('state_id','=',$state_id);

        $sites = $queryCity->lists('name','city_id');
        return $sites;
    }


    public function postSendContactUser(Request $request){
        try {
            $input = $request->only('name','email','message');
            $this->contacts->create($input);
            
            return "true";
        } catch (Exception $e) {
            return "false";
        }
    }


    protected function findUser($username)
    {
        return \App\Models\Users::select('*')->whereEmail($username)->orWhere('username',$username);
    }

}
