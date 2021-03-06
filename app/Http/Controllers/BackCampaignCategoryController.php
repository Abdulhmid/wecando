<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models as Md;
use App\Additionals\Datatables\BackCampaignCategoryDatatable;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\CampaignCategoryForm;
use App\Http\Requests\CampaignCategoryRequest;
use Illuminate\Support\Facades\Input;

class BackCampaignCategoryController extends Controller
{
    protected $model;
    protected $title = "Data Campaign Category";
    protected $url = "back-campaign-category";
    protected $folder = "module.back_campaign_category";
    protected $form;

    public function __construct(Md\campaignCategory $model)
    {
        $this->model    = $model;
        $this->form     = CampaignCategoryForm::class;
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

    public function postStore(CampaignCategoryRequest $request=null, $id="")
    {
        $input = $request->except('save_continue');
        $result = '';

        if($id == "" ) :
            $input['slug'] = str_slug($input['name'],"-"); ;
            $query = $this->model->create($input);
            $result = $query->id;
        else :
            $input['slug'] = str_slug($input['name'],"-"); ;
            $this->model->find($id)->update($input);
            $result = $id;
        endif;

        $save_continue = \Input::get('save_continue');
        $redirect = empty($save_continue)?$this->url:$this->url.'/edit/'.$result;

        return redirect($redirect)->with('message','Berhasil tambah data group!');
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
                                            'form' => $form,
                                            'breadcrumb' => 'edit-'.$this->url]);
    }

    public  function  getDelete($id ="")
    {
        if($id=="") return redirect($this->url);

        $groups = $this->model->find($id);

        $groups->delete();

        return redirect($this->url)->with('message','Berhasil hapus data group!');

    }

    public function getData(Request $request){
        return (new BackCampaignCategoryDatatable($this->model))->make();
    }

}
