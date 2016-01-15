<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models as Md;
use App\Additionals\Datatables\UsersDatatable;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\UsersForm;
use App\Http\Requests\UsersRequest;


class UsersController extends Controller
{
    protected $model;
    protected $title = "Data Pengguna";
    protected $url = "users";
    protected $folder = "module.users";
    protected $form;

    public function __construct(Md\Users $users)
    {
        $this->model    = $users;
        $this->form     = UsersForm::class;
    }

    public function getIndex()
    {
        $data['title'] = $this->title;
        $data['breadcrumb'] = $this->url;
        return view($this->folder.'.index', $data);
    }

    public function getCreate(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create($this->form, [
            'method' => 'POST',
            'url' => $this->url.'/store'
        ]);

        return view($this->folder.'.form', ['title' => $this->title,
                                    'form' => $form,
                                    'breadcrumb' => 'new-'.$this->url]);
    }

    public function postStore(UsersRequest $request=null, $id="")
    {
        $input = $request->except('save_continue','password_confirmation');
        $result = '';

        if( \Request::hasFile('image'))
            $photo  = (new \ImageUpload($input))->upload();

        if($id == "" ) :
            $input['image'] = isset($photo) ? $photo : "" ;
            $input['password']      = bcrypt($input['password']);
            $query = $this->model->create($input);
            $result = $query->id;
        else :
            if(\Request::hasFile('image'))
                $input['image'] = isset($photo) ? $photo : "";
            if(isset($input['password']) && $input['password'] != "")
                $input['password'] = bcrypt($input['password']);

            $this->model->find($id)->update($input);
            $result = $id;
        endif;

        $save_continue = \Request::get('save_continue');
        $redirect = empty($save_continue)?$this->url:$this->url.'/edit/'.$result;

        return redirect($redirect)->with('message','Berhasil tambah data Pengguna!');
    }

    public function getEdit(FormBuilder $formBuilder=null, $id="")
    {
        if ($id=="" || is_null($formBuilder)) return redirect($this->url);

        $edit = $this->model->find($id);

        $form = $formBuilder->create($this->form,[
            'method' => 'POST',
            'url' => $this->url.'/store/'.$id,
            'model' => $edit
        ]);

        return view($this->folder.'.form', ['title' => $this->title,
                                            'row' => $edit,
                                            'form' => $form,
                                            'breadcrumb' => 'edit-'.$this->url]);
    }

    public  function  getDelete($id ="")
    {
        if($id=="") return redirect($this->url);

        $this->model->find($id)->delete();

        return redirect($this->url)->with('message','Berhasil hapus data Pengguna!');

    }

    public function getData(Request $request){
        return (new UsersDatatable($this->model))->make();
    }
}
